

<form id="paypalPlaceAd" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">

    <!-- Identify your business so that you can collect the payments. -->
    <input type="hidden" name="business" value="">

    <!-- Specify a Buy Now button. -->
    <input type="hidden" name="cmd" value="_xclick">

    <!-- Specify details about the item that buyers will purchase. -->
    <input type="hidden" name="item_name" value="">
    <input type="hidden" name="item_number" value="">
    <input type="hidden" name="amount" value="">
    <input type="hidden" name="currency_code" value="USD">
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
    <input type="hidden" name="rm" value="2">
    <!-- Specify URLs -->
    {{--<input type='hidden' name='cancel_return' value='{{route("paypalCancel")}}'>--}}
    {{--<input type='hidden' name='return' value='{{route("placeAd_paypalReturn")}}'>--}}

    <!-- Display the payment button. -->
    <input type="image" name="submit" border="0" class="buy_ad"
           src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
    <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
</form>
