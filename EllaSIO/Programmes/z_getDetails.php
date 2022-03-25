<?php
    include "z_config.php";

    $request = $_POST['request']; // request

    // Get formateur list
    if($request == 'f1'){
        $search = $_POST['search'];
        $query = "SELECT * FROM formateur WHERE NOMFormateur like'%".$search."%'";
        $result = mysqli_query($con,$query);
        $response=null;
        while($row = mysqli_fetch_array($result) ){
            $response[] = array("value"=>$row['IDFormateur'],"label"=>$row['NOMFormateur']);
        }
        // encoding array to json format
        echo json_encode($response);
        exit;
    }

    // Get details
    if($request == 'f2'){
        $userid = $_POST['userid'];
        $sql = "SELECT * FROM formateur WHERE IDFormateur=".$userid;
        /*$sql = "SELECT * FROM users WHERE id=".$userid;*/

        $result = mysqli_query($con,$sql); 

        $form_arr = array();

        while( $row = mysqli_fetch_array($result) ){
            $formid = $row['IDFormateur'];
            $formname = $row['NOMFormateur'];
            $formemail = $row['EMAILFormateur'];
            $formtelephone = $row['TELFormateur'];
            

        $form_arr[] = array("id" => $formid, "nom" => $formname, "email" => $formemail, "telephone" => $formtelephone);
        }

        // encoding array to json format
        echo json_encode($form_arr);
        exit;
    }
    


    // Get reservant externe list
    if($request == 're1'){
        $search = $_POST['search'];
        $query = "SELECT * FROM client WHERE CLINom like'%".$search."%'";
        $result = mysqli_query($con,$query);
        while($row = mysqli_fetch_array($result) ){
            $response[] = array("value"=>$row['IDCLient'],"label"=>$row['CLINom']);
        }

        // encoding array to json format
        echo json_encode($response);
        exit;
    }

    // Get details
    if($request == 're2'){
        $userid = $_POST['userid'];
        $sql = "SELECT * FROM client WHERE IDCLient=".$userid;
        /*$sql = "SELECT * FROM users WHERE id=".$userid;*/

        $result = mysqli_query($con,$sql); 

        $client_arr = array();

        while( $row = mysqli_fetch_array($result) ){
            $clientid = $row['IDCLient'];
            $clientnom = $row['CLINom'];
            $clientadresse = $row['CLIAdresseComplete'];
            $clientcodepostal = $row['CLICodePostal'];
            $clientville = $row['CLIVille'];
            $clientemail = $row['CLIEmail'];
            $clienttelephone = $row['CLITelFixe'];
            

        $client_arr[] = array("id" => $clientid, "nom" => $clientnom, "email" => $clientemail, "telephone" => $clienttelephone, "adresse" => $clientadresse, "cp" => $clientcodepostal, "ville" => $clientville);
        }

        // encoding array to json format
        echo json_encode($client_arr);
        exit;
    }



    // Get reservant interne list
    if($request == 'ri1'){
        $search = $_POST['search'];

        $query = "SELECT * FROM reservantinterne WHERE NOMReservant like'%".$search."%'";
        $result = mysqli_query($con,$query);
        
        while($row = mysqli_fetch_array($result) ){
            $response[] = array("value"=>$row['IDResponsable'],"label"=>$row['NOMReservant']);
        }

        // encoding array to json format
        echo json_encode($response);
        exit;
    }

    // Get details
    if($request == 'ri2'){
        $userid = $_POST['userid'];
        $sql = "SELECT * FROM reservantinterne WHERE IDResponsable=".$userid;
        /*$sql = "SELECT * FROM users WHERE id=".$userid;*/

        $result = mysqli_query($con,$sql); 
        $resi_arr = array();

        while( $row = mysqli_fetch_array($result) ){
            $formid = $row['IDResponsable'];
            $formname = $row['NOMReservant'];
            $formemail = $row['EMAILReservant'];
            $formtelephone = $row['TELReservant'];
            

        $resi_arr[] = array("id" => $formid, "nom" => $formname, "email" => $formemail, "telephone" => $formtelephone);
        }

        // encoding array to json format
        echo json_encode($resi_arr);
        exit;
    }