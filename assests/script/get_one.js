function tang(){
    var t= document.getElementById("sl").value;
    if(parseInt(t)<20){
    document.getElementById("sl").value=parseInt(t)+1;
    }
}
function giam(){
    var g =document.getElementById("sl").value;
    if(parseInt(g)>1){
        document.getElementById("sl").value=parseInt(g)-1;
    }
}
function addCart(id){
			num=$("#sl").val();
			$.post('http://localhost/php0519E/PRJ_Web_PHP/?controller=product&action=addcart',{'id':id,'num':num}, function(data){
    
                 $("#numberCart").text(data);

                 $('#showCart').modal();
			});

		}
function updateCart(id){
    num =$("#quantity_"+id).val();
    $.post('http://localhost/php0519E/PRJ_Web_PHP/?controller=product&action=updatecart',{'id':id,'num':num}, function(data){

            $("#listCart").load("http://localhost/php0519E/PRJ_Web_PHP/?controller=cart&action=getcart #cartx");
            });
}

function deleteCart(id){
     num =$("#quantity_"+id).val();
    $.post('http://localhost/php0519E/PRJ_Web_PHP/?controller=product&action=updatecart',{'id':id,'num':0}, function(data){

            $("#listCart").load("http://localhost/php0519E/PRJ_Web_PHP/?controller=cart&action=getcart #cartx");
            });
}

function batDangNhap(){
    $('#showDangNhap').modal();
}
