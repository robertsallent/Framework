<?php

class Email{
    // PROPIEDADES
    public $date, $to, $from, $name, $subject, $message, $headers;
    
    // constructor de emails
    public function __construct(string $t, string $f, string $n, string $s, string $m){
        $this->date = date('d/m/y H:i:s');
        $this->to = $t;
        $this->from = $f;
        $this->name = $n;
        $this->subject = $s;
        
        // el mensaje será con formato HTML
        $this->headers = "MIME-Version: 1.0\r\n";
        $this->headers .= "Content-type: text/html; charset=utf-8\r\n";
        $this->headers .= "To: <$this->to>\r\n";
        $this->headers .= "From: $this->name <$this->from>\r\n";
        
        // preparamos el mensaje que se enviará
        $this->message = "<h2>MENSAJE</h2>";
        $this->message .= "<p>De $this->name ($this->from).";
        $this->message .= "Recibido el $this->date.</p>"; 
        $this->message .= "<h3>$this->subject</h3>";
        $this->message .= "<p>$m</p>"; 
    }
      
    // método para enviar un mail
    public function enviar():bool{
        return mail($this->to, $this->subject, $this->message, $this->headers);
    }     
}



