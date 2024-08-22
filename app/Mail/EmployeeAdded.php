<?php

namespace App\Mail;

use App\Models\Employes;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmployeeAdded extends Mailable
{
    use Queueable, SerializesModels;

    public $employee;
    public $adminEmail;

    /**
     * Create a new message instance.
     *
     * @param \App\Models\Employes $employee
     * @param string $adminEmail
     */
    public function __construct(Employes $employee, $adminEmail)
    {
        $this->employee = $employee;
        $this->adminEmail = $adminEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.employee_added')
                    ->with([
                        'employeeName' => $this->employee->firstName . ' ' . $this->employee->lastName,
                        'adminEmail' => $this->adminEmail,
                    ]);
    }
}