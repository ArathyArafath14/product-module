<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
</head>

<body>
<h2>product Name {{$product['product_name']}}</h2>
<br/>
 
                      
                        <div class="form-group">
                            <input class="form-control" type="text" name="product_price" placeholder="Price" value="{{$product->product_price}}">
                          
                        </div>
                        
                        
                        <div class="form-group">
                            <input class="form-control" type="text" name="product_price" placeholder="Price" value="{{$product->type}}">
                            
                           
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="product_price" placeholder="Price" value="{{$product->status}}">
                           
                        </div>


                  
</body>

</html>