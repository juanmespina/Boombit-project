         echo -e "1.0 ---- Installing plugins"
         echo -e "1.1 ---- Installing Local plugins"
         docker exec -i wpcli_boombit_conf sh -c "wp plugin install plugins/advanced-custom-fields-pro.zip --force --allow-root --activate"
        
		 echo -e "1.1 ---- Installing Online plugins"
         docker exec -i wpcli_boombit_conf sh -c "wp plugin install contact-form-7 --activate"
       