@include('emails.layouts.header')
    <tr class="">
        <td class="headline">Oops! Incomplete account information</td>
    </tr>
    <tr>
        <td>
            <center class="">
                <table cellpadding="0" cellspacing="0" class="" style="margin: 0 auto;" width="100%">
                    <tbody class="">
                        <tr class="">
                            <td class="" style="color:#444; font-weight: 400;"><br><br>
                                Hi {{ $client->firstname }},<br>
                                With respect to your account creation, you are adviced to kindly visit the nearest office location to submit your passport for us to complete your account creation.  Click the button below to see our office location(s).<em>We are here to always serve you better</em>
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
                <a style="background-color:#674299;border-radius:4px;color:#fff;display:inline-block;font-family:Helvetica, Arial, sans-serif;font-size:18px;font-weight:normal;line-height:50px;text-align:center;text-decoration:none;width:350px;-webkit-text-size-adjust:none;" href="https://www.lawpavilion.com">See available location(s)</a>
            </div>
            <br>
        </td>
    </tr>
@include('emails.layouts.footer')
