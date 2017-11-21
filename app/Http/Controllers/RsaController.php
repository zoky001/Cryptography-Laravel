<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  \Illuminate\Support\Facades\Hash;

class RsaController extends Controller {

    //

    public function index() {

        return view('home');
    }

    public function generateKeys() {


        $tajni = uniqid();


        /* $privatni = uniqid();
          $javni = uniqid(); */
        $privatni = '';
        $javni = '';

        $config = array(
            "digest_alg" => "sha512",
            "private_key_bits" => 4095,
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
        );

// Create the private and public key
        $res = openssl_pkey_new($config);

        $privKey = '';


// Extract the private key from $res to $privKey
        openssl_pkey_export($res, $privKey);

// Extract the public key from $res to $pubKey
        $pubKey = openssl_pkey_get_details($res);
        $pubKey = $pubKey["key"];

        $javni = $pubKey;
        $privatni = $privKey;

        $myfile = fopen("D:\\Kljucevi_OS2\\javni.txt", "w"); // or die( "Unable to open file!" );
        $txt = $javni;
        fwrite($myfile, $txt);


        fclose($myfile);

        $myfile = fopen("D:\\Kljucevi_OS2\\privatni.txt", "w"); // or die( "Unable to open file!" );
        $txt = $privatni;
        fwrite($myfile, $txt);
        fclose($myfile);

        $myfile = fopen("D:\\Kljucevi_OS2\\tajni.txt", "w"); // or die( "Unable to open file!" );
        $txt = $tajni;
        fwrite($myfile, $txt);
        fclose($myfile);



        $kljucevi = ['tajni' => $tajni, 'javni' => $javni, 'privatni' => $privatni];
        echo json_encode($kljucevi);
    }

    function encrypt_decrypt($action, $string) {
        $file = 'D:\\Kljucevi_OS2\\tajni.txt';
        if (file_exists($file)) {
            $current_tajni = file_get_contents($file);
        }

        $output = false;
        $encrypt_method = "AES-256-CBC";
        $secret_key = $current_tajni;
        $secret_iv = 'This is my secret iv';

        $key = $secret_key;

        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr($secret_iv, 0, 16);

        if ($action == 'encrypt') {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        } else if ($action == 'decrypt') {
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }

        return $output;
    }

    public function sinkronoKriptiranje($text) {

        $encrypted_txt = $this->encrypt_decrypt('encrypt', $text);
        $decrypted_txt = $this->encrypt_decrypt('decrypt', $encrypted_txt);

        $tekstovi = ['kriptirani' => $encrypted_txt, 'dekriptirani' => $decrypted_txt];

        $myfile = fopen("D:\\Kljucevi_OS2\\kriptirani_tekst_sinkrono.txt", "w") or die("Unable to open file!");
        fwrite($myfile, $encrypted_txt);
        fclose($myfile);
        echo json_encode($tekstovi);
    }
    
    public function sinkronoDeKriptiranje(Request $request) {
       $text= $request -> Ktext;
        $myfile = fopen( "D:\\Kljucevi_OS2\\kriptirani_tekst_sinkrono_dekriptitanje.txt", "w" ) or die( "Unable to open file!" );
        fwrite( $myfile, $text );
        fclose( $myfile );
        
        $decrypted_txt = $this->encrypt_decrypt( 'decrypt', $text );
        $encrypted_txt = $this->encrypt_decrypt( 'encrypt', $decrypted_txt );
        
        $myfile = fopen( "D:\\Kljucevi_OS2\\pravi_tekst_sinkrono_dekriptitanje.txt", "w" ) or die( "Unable to open file!" );
        fwrite( $myfile, $decrypted_txt );
        fclose( $myfile );
        
        $tekstovi = [ 'kriptirani' => $encrypted_txt, 'dekriptirani' => $decrypted_txt ];
        echo json_encode( $tekstovi );
        
    }

    public function asinkronoKriptiranje($text) {

        $encrypted_txt = $this->encrypt_decrypt_asyc('encrypt', $text);
        $decrypted_txt = $this->encrypt_decrypt_asyc('decrypt', $encrypted_txt);

        $tekstovi = ['kriptirani' => $encrypted_txt, 'dekriptirani' => $decrypted_txt];

        $myfile = fopen("D:\\Kljucevi_OS2\\kriptirani_tekst_asinkrono.txt", "w") or die("Unable to open file!");
        fwrite($myfile, $encrypted_txt);
        fclose($myfile);
        echo json_encode($tekstovi);
    }
    
    public function asinkronoDeKriptiranje(Request $request) {
        
        $text= $request -> Ktext;
        
        $myfile = fopen( "D:\\Kljucevi_OS2\\kriptirani_tekst_asinkrono_dekriptitanje.txt", "w" ) or die( "Unable to open file!" );
        fwrite( $myfile, $text );
        fclose( $myfile );
        
        $decrypted_txt = $this-> encrypt_decrypt_asyc( 'decrypt', $text );
        $encrypted_txt = $this-> encrypt_decrypt_asyc( 'encrypt', $decrypted_txt );
        
        $myfile = fopen( "D:\\Kljucevi_OS2\\pravi_tekst_asinkrono_dekriptitanje.txt", "w" ) or die( "Unable to open file!" );
        fwrite( $myfile, $decrypted_txt );
        fclose( $myfile );
        
        $tekstovi = ['kriptirani' => $encrypted_txt, 'dekriptirani' => $decrypted_txt];
        echo json_encode($tekstovi); 
    }

    function encrypt_decrypt_asyc($action, $string) {
        $file = 'D:\\Kljucevi_OS2\\javni.txt';
        if (file_exists($file)) {
            $current_javni = file_get_contents($file);
        }

        $file = 'D:\\Kljucevi_OS2\\privatni.txt';
        if (file_exists($file)) {
            $current_privatni = file_get_contents($file);
        }

        if ($action == 'encrypt') {
            if (openssl_public_encrypt($string, $encrypted, $current_javni)) {
                $string = base64_encode($encrypted);
            } else {
                throw new Exception('Unable to encrypt data. Perhaps it is bigger than the key size?');
            }
        } else if ($action == 'decrypt') {
            if (openssl_private_decrypt(base64_decode($string), $decrypted, $current_privatni)) {
                $string = $decrypted;
            } else {
                $string = '';
            }
        }

        return $string;
    }
    function encrypt_decrypt_dig_potpis($action,$string) {
	$file = 'D:\\Kljucevi_OS2\\javni.txt';
	if ( file_exists( $file ) ) {
		$current_javni = file_get_contents( $file );
	}
	
	$file = 'D:\\Kljucevi_OS2\\privatni.txt';
	if ( file_exists( $file ) ) {
		$current_privatni = file_get_contents( $file );
	}
	
	if ( $action == 'encrypt' ) {
		if ( openssl_private_encrypt( $string, $encrypted, $current_privatni ) ) {
			$string = base64_encode( $encrypted );
		} else {
			throw new Exception( 'Unable to encrypt data. Perhaps it is bigger than the key size?' );
		}
	} else if ( $action == 'decrypt' ) {
		if ( openssl_public_decrypt( base64_decode( $string ), $decrypted, $current_javni ) ) {
			$string = $decrypted;
		} else {
			$string = '';
		}
	}
	
	return $string;
}
    public function sazetak(Request $request) {
        
        $tekst =  $request -> text;
        
		$myfile = fopen( "D:\\Kljucevi_OS2\\dig_pravi_tekst.txt", "w" ) or die( "Unable to open file!" );
		fwrite( $myfile, $tekst );
		fclose( $myfile );
		$sazetak = sha1( $tekst );

		$myfile = fopen( "D:\\Kljucevi_OS2\\dig_sazetak.txt", "w" ) or die( "Unable to open file!" );
		fwrite( $myfile, $sazetak );
		fclose( $myfile );
		echo $sazetak;
        
    }
    public function potpisi() {
        $file = "D:\\Kljucevi_OS2\\dig_sazetak.txt";
		$text = file_get_contents( $file );
		$encrypted_txt = $this->encrypt_decrypt_dig_potpis( 'encrypt', $text );

		$myfile = fopen( "D:\\Kljucevi_OS2\\dig_potpis.txt", "w" ) or die( "Unable to open file!" );
		fwrite( $myfile, $encrypted_txt );
		fclose( $myfile );
		echo $encrypted_txt;
        
    }
    
    public function provjeri(Request $request){
        
        	
		$dig_potpis = $request -> dig_potpis;  
		
                $original = $request -> sazetak;
		
                
                $sazetak = sha1( $original );

		$myfile = fopen( "D:\\Kljucevi_OS2\\dig_potpis_provjera.txt", "w" ) or die( "Unable to open file!" );
		fwrite( $myfile, $dig_potpis );
		fclose( $myfile );

		$myfile = fopen( "D:\\Kljucevi_OS2\\sazetak_provjera.txt", "w" ) or die( "Unable to open file!" );
		fwrite( $myfile, $sazetak);
		fclose( $myfile );

		$decrypted_txt = $this->encrypt_decrypt_dig_potpis( 'decrypt', $dig_potpis );
		
                $istina = FALSE;
               
                if ($decrypted_txt == $sazetak) {
                    $istina = TRUE;
                }
                
                 $provjera = [ 'dencrypted' => $decrypted_txt, 'sazetak' => $sazetak, 'ispravan' => $istina ];
        
               
                 echo json_encode( $provjera );
        
    }
}
