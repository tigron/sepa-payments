# sepa-payments
Sepa payment file creation


	$organization = new \Tigron\Sepa\Organization();
	$organization->name = 'Tigron';
	$organization->set_identification('kbo-bce', '0888764123');

	$credit = new \Tigron\Sepa\File\Credit();
	$credit->messageIdentification = 1;
	$credit->initiatingParty = $organization;


	$debtor = new \Tigron\Sepa\Debtor();
	$debtor->name = 'Tigron';
	$debtor->country = 'BE';
	$debtor->zipcode = '1930';
	$debtor->city = 'Zaventem';
	$debtor->street = 'Excelsiorlaan';
	$debtor->housenumber = '17';

	// Create a payment

	$payment = new \Tigron\Sepa\Payment();
	$payment->paymentInformationIdentification = 'payment_1';
	$payment->requestedExecutionDate = new DateTime('2016-09-15');
	$payment->debtorAccount = 'BE12123412341234';
	$payment->debtorAgent = 'BICAZE';
	$payment->debtor = $debtor;


	$creditor = new \Tigron\Sepa\Creditor();
	$creditor->name = 'My Supplier';
	$creditor->country = 'BE';
	$creditor->zipcode = '1930';
	$creditor->city = 'Zaventem';
	$creditor->street = 'Excelsiorlaan';
	$creditor->housenumber = '17';

	// Create a transaction

	$transaction = new \Tigron\Sepa\Transaction();
	$transaction->paymentIdentification = 'payment_1';
	$transaction->amount = 500;
	$transaction->creditorAgent = 'BICEZA';
	$transaction->creditorAccount = 'BE12123412341234';
	$transaction->creditor = $creditor;
	$transaction->structured_message = '123123412345';
	$payment->transactions[] = $transaction;

	$transaction = new \Tigron\Sepa\Transaction();
	$transaction->paymentIdentification = 'payment_1';
	$transaction->amount = 500;
	$transaction->creditorAgent = 'BICEZA';
	$transaction->creditorAccount = 'BE12123412341234';
	$transaction->creditor = $creditor;
	$transaction->unstructured_message = 'Invoice 123';
	$payment->transactions[] = $transaction;

	$credit->payments = [ $payment ];
	$xml = $credit->render();
