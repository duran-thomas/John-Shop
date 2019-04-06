<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>John Shop</title>
    <link rel="stylesheet" href="css/mainpage.css">
</head>
<body>
    <div class="container">  
        <form id="contact" action="" method="post">
            <h3>Welcome To John Shop</h3>
            <h4>Place Your Order By Filling Out The Form Below</h4>
            <fieldset>
                <input placeholder="Your name" type="text" tabindex="1" required autofocus name="name" id="name">
            </fieldset>
            <fieldset>
                <input placeholder="Your ID Number" type="number" tabindex="2" min="7" max="7" required name="id_num" id="id_num">
            </fieldset>
            <fieldset>
                <input placeholder="Your Location" type="text" tabindex="3" required name="location" id="location">
            </fieldset>
            <fieldset>
                <div class="row" id="orderItems">
                    <select name="stock_id" id="stock_id">
                        @foreach ($stock as $stock)
                            <option value="{{$stock->id}}">{{$stock->item_name}}</option> 
                        @endforeach
                    </select>
                    <input placeholder="Quantity" size="6" type="number" tabindex="3" required style="width:90px">
                </div> 
            </fieldset>
            <a href="javascript:add_new()">Add More Items</a>
            <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
            </fieldset>
        </form>
        </div>
        <script type="text/javascript">
            function add_new()
            {
                var original = document.getElementById('orderItems')
                var copy = original.cloneNode(true)
                original.after(copy)
            }
        </script>
</body>
</html>


