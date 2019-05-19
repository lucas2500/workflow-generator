$rows = Import-csv C:\xampp\htdocs\wf\Repo/wf.csv -Encoding UTF7

foreach($wf in $rows){

    $MailSender = "turock360@gmail.com"
    $Password = ConvertTo-SecureString -String "bombapatch36" -AsPlainText -Force
    $credential = New-Object -TypeName System.Management.Automation.PSCredential -ArgumentList $MailSender, $Password

    $Body = "

        <!DOCTYPE html>
        <html>
        <head>
            <title></title>
        </head>
        <body>

            " + $wf.corpo + "

        </body>
        </html>
    "

    $anexo01 = 'C:\xampp\htdocs\wf\uploads\'+$wf.anexo01.trim()
    $anexo02 = 'C:\xampp\htdocs\wf\uploads\'+$wf.anexo02.trim()
    $anexo03 = 'C:\xampp\htdocs\wf\uploads\'+$wf.anexo03.trim()

    write-host $anexo01

    try{

        Send-MailMessage -From $MailSender -To $wf.destinatario -Subject $wf.assunto -Body $Body -BodyAsHtml -Attachments $anexo01, $anexo02, $anexo03 -Credential $credential -SmtpServer "smtp.gmail.com" -Port "587" -UseSsl -Encoding UTF8

        write-host "Email enviado com suceso para: " $wf.destinatario
    
    } catch {

        write-host "Nao foi possivel enviar o email para: " $wf.destinatario
    }

}