<?php

            $prov = $this->input->post('prov', TRUE);

            $curl = curl_init();

            curl_setopt_array($curl, array(
              CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=$prov",
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => "GET",
              CURLOPT_HTTPHEADER => array(
                "key:b277bcce83b57bd914e9db7110ab40d9"
              ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

            if ($err) {
              echo "cURL Error #:" . $err;
            } else {
              $data = json_decode($response, TRUE);
              echo '<option value="" selected disabled>Kota / Kabupaten</option>';

              for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
                  echo '<option value="'.$data['rajaongkir']['results'][$i]['city_id'].','.$data['rajaongkir']['results'][$i]['city_name'].'">'.$data['rajaongkir']['results'][$i]['city_name'].'</option>';
              }
            }
       