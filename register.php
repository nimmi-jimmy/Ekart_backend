<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods:POST,GET,PUT,DELETE');
header('Access-Control-Allow-Headers: content-type or other');
header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"));
$name = $data->name;
$value = $data->value;
$file = $data->file;
$email = $data->email;
$password = $data->password;
$cpassword = $data->cpassword;

$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"ekart");

$sql = "insert into register(
        name,
        value,
        file,
        email,
        password,
        cpassword
    )
    values(
        '$name',
        '$value',
        '$file',
        '$email',
        '$password',
        '$cpassword'
    )";
        $result = mysqli_query($con,$sql);

        if($result){
            $response['data']=array(
                'status'=>'valid'
            );
            echo json_encode($response);
        }
        else{
            $response['data']=array(
                'status'=>'invalid'
            );
            echo json_encode($response);
        }
?>