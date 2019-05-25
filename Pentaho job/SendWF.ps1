$rows = Import-csv C:\xampp\htdocs\wf\Repo/wf.csv -Encoding UTF7

foreach($wf in $rows){

    $MailSender = "turock360@gmail.com"
    $Password = ConvertTo-SecureString -String "" -AsPlainText -Force
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


    $anexo01 = $wf.anexo01.trim()
    $anexo02 = $wf.anexo02.trim()
    $anexo03 = $wf.anexo03.trim()

    write-host $anexo03

    $path01 = 'C:\xampp\htdocs\wf\uploads\'+$anexo01
    $path02 = 'C:\xampp\htdocs\wf\uploads\'+$anexo02
    $path03 = 'C:\xampp\htdocs\wf\uploads\'+$anexo03

    if($anexo01 -NotMatch '' -and $anexo02 -match '' -and $anexo03 -match ''){

        # try{

            Send-MailMessage -From $MailSender -To $wf.destinatario -Subject $wf.assunto -Body $Body -BodyAsHtml -Attachments $path01 -Credential $credential -SmtpServer "smtp.gmail.com" -Port "587" -UseSsl -Encoding UTF8

            write-host "Email enviado com suceso para: " $wf.destinatario

            write-host "Entrou no 01"
        
        # } catch {

            # write-host "Nao foi possivel enviar o email para: " $wf.destinatario
        # }


    } elseif ($anexo01 -NotMatch '' -and $anexo02 -NotMatch '' -and $anexo03 -match ''){

        # try{

            Send-MailMessage -From $MailSender -To $wf.destinatario -Subject $wf.assunto -Body $Body -BodyAsHtml -Attachments $path01, $path02 -Credential $credential -SmtpServer "smtp.gmail.com" -Port "587" -UseSsl -Encoding UTF8

            write-host "Email enviado com suceso para: " $wf.destinatario

             write-host "Entrou no 02"
        
        # } catch {

            # write-host "Nao foi possivel enviar o email para: " $wf.destinatario
        # }


    } else {

        # try{

            Send-MailMessage -From $MailSender -To $wf.destinatario -Subject $wf.assunto -Body $Body -BodyAsHtml -Attachments $path01, $path02, $path03 -Credential $credential -SmtpServer "smtp.gmail.com" -Port "587" -UseSsl -Encoding UTF8

            write-host "Email enviado com suceso para: " $wf.destinatario

             write-host "Entrou no 03"
        
        # } catch {

            # write-host "Nao foi possivel enviar o email para: " $wf.destinatario
        # }
    }
}