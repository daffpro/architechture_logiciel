<?php header ("Content-Type:text/xml"); ?>

<response>
    <status>
        200
    </status>
    <mode>
        VisaCreditCard
    </mode>
    <options>
        <option name="Transfer" url="http://myapi.com/controller/transfer?id=8230&reason=illness" />
        <option name="Cancel" url="http://myapi.com/controller/cancel?id=3934"/>
        <option name="New Booking" url="http://myapi.com/controller/book_new" />
    </options>
</response>