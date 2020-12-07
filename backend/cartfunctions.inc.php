<?php
//appends another item to the end of array ie(adds new item to cart)
function addElementsCart($order){
    if(!isset($_COOKIE['cart'])){
        $array=[$order];
        $element=json_encode($array);
        setcookie('cart',$element,time()+(86400 * 30),"/");

    }else{
        $element=json_decode($_COOKIE['cart'],true);
        array_push($element,$order);
        setcookie('cart',json_encode($element),time()+(86400 * 30),"/");
    }
}
//just returns the no of elements in a cart ie ( no of elements in the array)
function nOfElementsCart(){
    if(!isset($_COOKIE['cart'])){
        return 0;
    }else{
        $element=json_decode($_COOKIE['cart'],true);
        return count($element);
    }
}
//deletes a single element in the cart (array) using index positions
function deleteCartElement($index){
    if(!isset($_COOKIE['cart'])){
        return false;
    }else{
        $element=json_decode($_COOKIE['cart'],true);
        unset($element[$index]);
        $reindexedarray=array_values($element);
        setcookie('cart',json_encode($reindexedarray),time()+(86400 * 30),"/");
        return true;
    }
}
//deletes all of the elements in the cart
function deleteAllCart(){
    if(!isset($_COOKIE['cart'])){
        return false;
    }else{
        setcookie('cart',"",time()-1,"/");
        return true;
    }
}
//displays all elements in the cart as an array of associative array
function displayCart(){
    if(!isset($_COOKIE['cart'])){
        return false;
    }else{
        $element=json_decode($_COOKIE['cart'],true);
        return $element;
    }
}