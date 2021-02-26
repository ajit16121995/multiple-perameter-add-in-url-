<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="test.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <?php
        if(isset($_GET['size'])){
            $size = explode("_",$_GET['size']);
            //print_r($size);
        }
        if(isset($_GET['brandName'])){
            $brand = explode("_",$_GET['brandName']);
            //print_r($brand);
           
           
        }
    ?>
    size : 
    <input type="checkbox" <?php if(isset($_GET['size'])){
        if(in_array("xl",$size)){
            echo "checked='checked'";
        }
    } ?> class="check" value="xl">
    <input type="checkbox" <?php if(isset($_GET['size'])){
        if(in_array("ls",$size)){
            echo "checked='checked'";
        }
    } ?> class="check" value="ls">
    <input type="checkbox" <?php if(isset($_GET['size'])){
        if(in_array("xxl",$size)){
            echo "checked='checked'";
        }
    } ?> class="check" value="xxl">
    <input type="checkbox" <?php if(isset($_GET['size'])){
        if(in_array("xxxl",$size)){
            echo "checked='checked'";
        }
    } ?> class="check" value="xxxl">
    <br>
    brand name : 
    <input type="checkbox" <?php if(isset($_GET['brandName'])){
        if(in_array("fa",$brand)){
            echo "checked='checked'";
        }
    } ?> class="checkbrand" value="fa">
    <input type="checkbox" <?php if(isset($_GET['brandName'])){
        if(in_array("nike",$brand)){
            echo "checked='checked'";
        }
    } ?> class="checkbrand" value="nike">
    <input type="checkbox" <?php if(isset($_GET['brandName'])){
        if(in_array("re",$brand)){
            echo "checked='checked'";
        }
    } ?> class="checkbrand" value="re">
    <input type="checkbox" <?php if(isset($_GET['brandName'])){
        if(in_array("fac",$brand)){
            echo "checked='checked'";
        }
    } ?> class="checkbrand" value="fac">
    <input type="button" class="btn" value="check">
    <script>
        $(document).ready(function(){

            $(".checkbrand").on("click",function(){
                var val = $(this).val();
                var url = new URL(window.location.href);
                let params = new URLSearchParams(document.location.search.substring(1));
                if(this.checked == true){
                    if(url.search.includes('brandName')){
                        let size = params.get("brandName"); // is the string "Jonathan"
                        var arr = size.split("_");
                        var con = size.concat("_"+val);
                        url.searchParams.set('brandName', con);
                        window.history.pushState({}, '', url);
                    }else{
                        url.searchParams.append('brandName', val);
                        window.history.pushState({}, '', url);
                    }
                    
                }else{
                    if(url.search.includes('brandName')){
                        var get = params.get('brandName');
                        var arr = get.split("_");
                        
                        dd = arr.filter(item => item !== val);
                        var r = dd.join("_");
                        url.searchParams.set('brandName', r);
                        window.history.pushState({}, '', url);
                    }
                    let size = params.get("brandName");
                    var aray = size.split("_");
                    var remove = aray.filter(Boolean);
                    console.log(remove);
                    if(remove.length == 1){
                        url.searchParams.delete('brandName');
                        window.history.pushState({}, '', url);
                    }
                    
                }
                
                //location.reload();
                
               
            })
            $(".check").on("click",function(){
                var val = $(this).val();
                var url = new URL(window.location.href);
                let params = new URLSearchParams(document.location.search.substring(1));
                if(this.checked == true){
                    if(url.search.includes('size')){
                        let size = params.get("size"); // is the string "Jonathan"
                        var arr = size.split("_");
                        var con = size.concat("_"+val);
                        url.searchParams.set('size', con);
                        window.history.pushState({}, '', url);
                        //location.reload();
                    }else{
                        url.searchParams.append('size', val);
                        window.history.pushState({}, '', url);
                    }
                    
                }else{
                    if(url.search.includes('size')){
                        var get = params.get('size');
                        var arr = get.split("_");
                        
                        dd = arr.filter(item => item !== val);
                        var r = dd.join("_");
                        url.searchParams.set('size', r);
                        window.history.pushState({}, '', url);
                    }
                }
                location.reload();

            })
            
        })


    </script>
</body>
</html>