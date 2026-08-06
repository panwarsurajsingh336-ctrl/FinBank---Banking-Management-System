<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class First extends Controller
{
    /** Show the home page. */
    public function home()

    {
        return view('home');
    }

    /** Show the about page. */
    public function about()
    {
        return view('about');
    }

    /** Show the contact page. */
    public function contact()
    {
        return view('contact');
    }

    /** Create a new bank account after validating all submitted details. */
    public function createac(Request $req)
    {
        if (!$req->query('submit')) {
            return view('createac');
        }

        $pin = $this->clean($req->query('pin'));
        $name = $this->clean($req->query('name'));
        $fname = $this->clean($req->query('fname'));
        $email = $this->clean($req->query('email'));
        $phno = $this->clean($req->query('phno'));
        $gender = $this->clean($req->query('gender'));
        $country = $this->clean($req->query('country'));
        $state = $this->clean($req->query('state'));
        $city = $this->clean($req->query('city'));
        $amount = $this->positiveAmount($req->query('amount'), true);

        if (
            $pin === '' ||
            $name === '' ||
            $fname === '' ||
            $email === '' ||
            $phno === '' ||
            $gender === '' ||
            $country === '' ||
            $state === '' ||
            $city === '' ||
            $amount === null
        ) {
            return view('createac', [
                'message' => 'Please fill all account details correctly.'
            ]);
        }

        $ac = $this->generateAccountNumber();

        DB::insert(
            'insert into account (acn, pin, name, fname, email, phno, gender, country, state, city, amount)
             values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
            [$ac, $pin, $name, $fname, $email, $phno, $gender, $country, $state, $city, $amount]
        );

        return view('createac', [
            'message' => "Account created successfully. Account Number = $ac"
        ]);
    }

    /** Deposit money into the account number entered by the user. */
    public function deposit(Request $req)
    {
        if (!$req->query('submit')) {
            return view('deposit');
        }

        if (!session()->has('acn')) {
            return redirect('/login');
        }

        $ac = session('acn');
        $amount = $this->positiveAmount($req->query('amount'));

        if ($amount === null) {
            return $this->message('deposit', 'Please enter a valid deposit amount.');
        }

        $account = $this->findAccount($ac);

        if (!$account) {
            return $this->message('deposit', 'Account number not found.');
        }

        try {
            DB::beginTransaction();

            DB::update(
                'update account
                 set amount = amount + ?
                 where acn = ?',
                [$amount, $ac]
            );

            $this->recordTransaction($ac, 'Deposit', $amount, 'Amount Deposited');

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();

            return $this->message('deposit', 'Deposit failed. Please try again.');
        }

        $updatedAccount = $this->findAccount($ac);

        return view('deposit', [
            'message' => 'Amount deposited successfully.',
            'balance' => $this->balance($updatedAccount)
        ]);
    }

    /** Withdraw money from the account number entered by the user. */
    public function withdraw(Request $req)
    {
        if (!$req->query('submit')) {
            return view('withdraw');
        }

        if (!session()->has('acn')) {
            return redirect('/login');
        }

        $ac = session('acn');
        $amount = $this->positiveAmount($req->query('amount'));

        if ($amount === null) {
return $this->message('withdraw', 'Please enter a valid withdrawal amount.');        }

        $account = $this->findAccount($ac);

        if (!$account) {
            return $this->message('withdraw', 'Account number not found.');
        }

        if ($this->balance($account) < $amount) {
            return $this->message('withdraw', 'Insufficient balance.');
        }

        try {
            DB::beginTransaction();

            DB::update(
                'update account
                 set amount = amount - ?
                 where acn = ?',
                [$amount, $ac]
            );

            $this->recordTransaction($ac, 'Withdraw', $amount, 'Amount Withdrawn');

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();

            return $this->message('withdraw', 'Withdrawal failed. Please try again.');
        }

        $updatedAccount = $this->findAccount($ac);

        return view('withdraw', [
            'message' => 'Amount withdrawn successfully.',
            'balance' => $this->balance($updatedAccount)
        ]);
    }

    /** Transfer money from the sender account entered by the user to the receiver account entered by the user. */
    public function fundtransfer(Request $req)
    {
        if (!$req->query('submit')) {
            return view('fundtransfer');
        }

        if (!session()->has('acn')) {
            return redirect('/login');
        }

        $fromac = session('acn');
        $toac = $this->clean($req->query('toac'));
        $amount = $this->positiveAmount($req->query('amount'));

        if ($fromac === '' || $toac === '' || $amount === null) {
            return $this->message('fundtransfer', 'Please enter valid transfer details.');
        }

        if ($fromac === $toac) {
            return $this->message('fundtransfer', 'Sender and receiver account numbers must be different.');
        }

        $sender = $this->findAccount($fromac);

        if (!$sender) {
            return $this->message('fundtransfer', 'Account number not found.');
        }

        $receiver = $this->findAccount($toac);

        if (!$receiver) {
            return $this->message('fundtransfer', 'Account number not found.');
        }

        if ($this->balance($sender) < $amount) {
            return $this->message('fundtransfer', 'Insufficient balance.');
        }

        try {
            DB::beginTransaction();

            DB::update(
                'update account
                 set amount = amount - ?
                 where acn = ?',
                [$amount, $fromac]
            );

            DB::update(
                'update account
                 set amount = amount + ?
                 where acn = ?',
                [$amount, $toac]
            );

            $this->recordTransaction($fromac, 'Fund Transfer', $amount, 'Sent to ' . $toac);
            $this->recordTransaction($toac, 'Fund Received', $amount, 'Received from ' . $fromac);

            DB::commit();
        } catch (Throwable $e) {
            DB::rollBack();

            return $this->message('fundtransfer', 'Fund transfer failed. Please try again.');
        }

        $updatedSender = $this->findAccount($fromac);
        $currentBalance = $this->balance($updatedSender);

        return view('fundtransfer', [
            'message' => '₹' . $this->formatAmount($amount) . ' transferred successfully. Your current balance is ₹' . $this->formatAmount($currentBalance) . '.'
        ]);
    }

    /** Change the PIN only after verifying the account number and old PIN entered by the user. */
    public function pinchange(Request $req)
    {
        if (!$req->query('submit')) {
            return view('pinchange');
        }

        if (!session()->has('acn')) {
            return redirect('/login');
        }

        $ac = session('acn');
        $oldpin = $this->clean($req->query('oldpin'));
        $newpin = $this->clean($req->query('newpin'));

       if ($oldpin === '' || $newpin === '') {
    return $this->message('pinchange', 'Please enter old PIN and new PIN.');
}

        $account = $this->findAccount($ac);

        if (!$account) {
            return $this->message('pinchange', 'Account number not found.');
        }

        if ((string) $account->pin !== $oldpin) {
            return $this->message('pinchange', 'Old PIN is incorrect.');
        }

        DB::update(
            'update account set pin = ? where acn = ?',
            [$newpin, $ac]
        );

        return $this->message('pinchange', 'PIN changed successfully.');
    }

    /** Show the current balance for the account number entered by the user. */
    public function balanceinq(Request $req)
    {
        if (!session()->has('acn')) {
            return redirect('/login');
        }

        $ac = session('acn');
        $account = $this->findAccount($ac);

        return view('balanceinq', [
            'message' => 'Balance retrieved successfully.',
            'balance' => $this->balance($account)
        ]);
    }

    /** Fetch and pass complete account details for the account number entered by the user. */
    public function acsummary(Request $req)
    {
        if (!$req->query('submit')) {
            return view('acsummary');
        }

        if (!session()->has('acn')) {
            return redirect('/login');
        }

        $ac = session('acn');


        $account = $this->findAccount($ac);

        if (!$account) {
            return $this->message('acsummary', 'Account number not found.');
        }

        $transactions = DB::select(
            'select * from transactions where acn = ? order by created_at desc',
            [$ac]
        );

        return view('acsummary', [
            'account' => $account,
            'transactions' => $transactions
        ]);
    }

    /** Fetch one account safely by account number. */
    private function findAccount(string $ac): ?object
    {
        return DB::selectOne(
            'select * from account where acn = ?',
            [$ac]
        );
    }

    /** Generate the next account number without using a fixed user account for banking operations. */
    private function generateAccountNumber(): string
    {
        $row = DB::selectOne('select count(*) as total from account');
        $nextNumber = ((int) ($row->total ?? 0)) + 101;

        return 'FNB' . $nextNumber;
    }

    /** Convert a submitted amount to a valid positive number. */
    private function positiveAmount($value, bool $allowZero = false): ?float
    {
        if (!is_numeric($value)) {
            return null;
        }

        $amount = (float) $value;

        if ($allowZero) {
            return $amount >= 0 ? $amount : null;
        }

        return $amount > 0 ? $amount : null;
    }

    /** Convert the stored varchar balance to a numeric value safely. */
    private function balance(?object $account): float
    {
        if (!$account || !isset($account->amount) || !is_numeric($account->amount)) {
            return 0.0;
        }

        return (float) $account->amount;
    }

    /** Trim submitted string values safely. */
    private function clean($value): string
    {
        return trim((string) $value);
    }

    /** Return a view with a standard message payload. */
    private function message(string $view, string $message)
    {
        return view($view, [
            'message' => $message
        ]);
    }

    /** Add one transaction history row for an account operation. */
    private function recordTransaction(string $ac, string $type, float $amount, string $remarks): void
    {
        DB::insert(
            'insert into transactions (acn, transaction_type, amount, remarks) values (?, ?, ?, ?)',
            [$ac, $type, $amount, $remarks]
        );
    }

    /** Format amounts without unnecessary decimal places. */
    private function formatAmount(float $amount): string
    {
        return rtrim(rtrim(number_format($amount, 2, '.', ''), '0'), '.');
    }

    public function login(Request $req)
    {
        if ($req->query('submit')) {
            $ac = $req->query('ac');
            $pin = $req->query('pin');

            $account = DB::selectOne(
                "select * from account where acn=? and pin=?",
                [$ac, $pin]
            );

            if (!$account) {
                return view('login', [
                    'message' => 'Invalid Account Number or PIN'
                ]);
            }

            session([
                'acn' => $account->acn,
                'name' => $account->name
            ]);

            return redirect('/');
        }

        return view('login');
    }

    public function logout()
    {
        session()->flush();

        return redirect('/login');
    }
}
