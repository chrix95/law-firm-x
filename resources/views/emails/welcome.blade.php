@include('emails.layouts.header')
    <tr class="">
        <td class="headline">Welcome to LawPavilion!</td>
    </tr>
    <tr>
        <td>
            <center class="">
                <table cellpadding="0" cellspacing="0" class="" style="margin: 0 auto;" width="100%">
                    <tbody class="">
                        <tr class="">
                            <td class="" style="color:#444; font-weight: 400;"><br><br>
                                Hi {{ $client->firstname }},<br>
                                Winning companies put people first. If you focus on recruiting, cultivating, and retaining good people, you’ll see better results. This is the fundamental belief in LawPavilion. <br><br>
                                Your profile has been successfully created as a <em>Client</em>
                                <br><br>  
                                <br>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </center>
        </td>
    </tr>
    <tr>
        <td class="">
            <div class="">
                <a style="background-color:#674299;border-radius:4px;color:#fff;display:inline-block;font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:normal;line-height:50px;text-align:center;text-decoration:none;width:350px;-webkit-text-size-adjust:none;" href="https://www.lawpavilion.com/about">Visit Our Website</a>
            </div>
            <br>
        </td>
    </tr>
@include('emails.layouts.footer')
