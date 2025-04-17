<?php
   


//Add User Detail ADA dashboard

function fetchApiData($domain, $username, $email) {
  // Encode the domain in base64
  $website_name = base64_encode($domain);
  
  $packageType = "free-widget";
  $arrDetails = [
      'name' => $username,
      'email' => $email,
      'company_name' => $username,
      'website' => $website_name,
      'package_type' => $packageType,
      'start_date' => date('c'), // ISO 8601 format
      'end_date' => '',
      'price' => '',
      'discount_price' => '0',
      'platform' => 'CubeCart',
      'api_key' => '',
      'is_trial_period' => '',
      'is_free_widget' => '1',
      'bill_address' => '',
      'country' => '',
      'state' => '',
      'city' => '',
      'post_code' => '',
      'transaction_id' => '',
      'subscr_id' => '',
      'payment_source' => ''
  ];

  $apiUrl = "https://ada.skynettechnologies.us/api/get-autologin-link";

  // Prepare the POST request
  $response = sendPostRequest($apiUrl, ['website' => $website_name]);

  if ($response && isset($response['link'])) {
      
  } else {
     

      $secondApiUrl = "https://ada.skynettechnologies.us/api/add-user-domain";
      $secondResponse = sendPostRequest($secondApiUrl, $arrDetails);

      if ($secondResponse && isset($secondResponse['success']) && $secondResponse['success']) {
          
      } else {
         
      }
  }
}

function sendPostRequest($url, $data) {
  $options = [
      'http' => [
          'header'  => "Content-Type: application/json\r\n",
          'method'  => 'POST',
          'content' => json_encode($data),
          'ignore_errors' => true // Capture API errors in response
      ]
  ];

  $context  = stream_context_create($options);
  $result = file_get_contents($url, false, $context);
  
  if ($result === FALSE) {
      return null;
  }

  return json_decode($result, true);
}

// Example Usage
$domain = $_SERVER['HTTP_HOST']; // Change as needed
global $admin;
 
$username = $admin->get_username();      // Username
$email = $admin->get_email();     

fetchApiData($domain, $username, $email);

?>

<link href="<?php echo WB_URL; ?>/modules/all_in_one_accessibility/css/css/bootstrap.min.css" rel="stylesheet" />
<link href="<?php echo WB_URL; ?>/modules/all_in_one_accessibility/css/css/style.css" rel="stylesheet" />

<style>
.btn [class*=" icon-"], .btn [class^=icon-], .s-btn [class*=" icon-"], .s-btn [class^=icon-], [class*=" icon-"], [class^=icon-], i.icon, span.icon {
    display: contents;
}
.all-in-one-accessibility-wrap .accessibility-settings .all-one-accessibility-form .icon-size-wrapper .option, .all-in-one-accessibility-wrap .accessibility-settings .all-one-accessibility-form .icon-type-wrapper .option {
    width: 130px;
    height: 130px;
    padding: 10px !important;
    text-align: center;
    background-color: #3c007f !important;
    outline: 4px solid #fff;
    outline-offset: -4px;
    border-radius: 10px;
}
.all-in-one-accessibility-wrap .accessibility-settings .all-one-accessibility-form {
    margin: 0 auto 40px;
    border-radius: 19px;
    background: #e9efff;
    padding: 27px 20px 30px 102px;
}
</style>



  <div class="shopify-wrap-block">
    <div class="container">
      <div class="set-width">
        <div class="all-in-one-accessibility-wrap">
          <div class="accessibility-settings">
            <div class="all-one-accessibility-form">
              <div class="all-one-accessibility-form-inner">
                <form id="widget-form" name="widget-form" class="form-controler">
                   
                  <div class="mb-3 row">
                    <div class="col-sm-12">
                      <div class="form-text">
                        <B>NOTE: Currently, All in One Accessibility is dedicated to enhancing accessibility
                          specifically for websites and online stores.</B>
                      </div>
                      <B>  <p class="form-text" id="upgrade_html_notes">Please <a
                          href="https://ada.skynettechnologies.us/trial-subscription" target="_blank">Upgrade</a>
                        to full
                        version of All in One Accessibility Pro with 10 days free trial</p></B>
                    </div>
                  </div>
                  <div class="mb-3 row ">
                    
                  </div>
                  </div>
                  <div class="mb-3 row d-none" id="license_key_html">
                    <label for="inputPassword" class="col-sm-3 col-form-label">License Key required for full
                      version:</label>
                    <div class="col-sm-9">
                      <input type="text" name="license_key" class="form-control" id="license_key" value=""
                        onkeyup="mylicensekey()" />
                     
                      <p class="form-text " id="error_message">Please enter valid License Key</p>
                    </div><br>
                  </div>
                  <div class="mb-3 row " id="colorcode_html">
                    <label for="inputPassword" style="color: #000;" class="col-sm-3 col-form-label">Hex color code:</label>
                    <div class="col-sm-9">
                      <input type="text" name="colorcode"  style="height:auto" class="form-control" id="colorcode" value="" />
                      <div class="form-text">You can customize the ADA Widget color. For example: FF5733</div>
                    </div>
                  </div>
                  <div class="icon-custom-position-wrapper mb-3 row">
                    <div class="mb-4 pe-0 ps-0">
                      <label class="custom-switcher ">
                        <span class="custom-switcher_right">
                          <input type="checkbox" id="custom-position-switcher" class="custom-switcher_inp_2"
                            value="1" />
                          <span class="custom-switcher_body" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="Toggle to override <Top Left> position" data-bs-custom-class="switcher-tooltip">
                          </span>
                          <span class="custom-switcher_label">Enable precise accessibility widget icon position:</span>
                        </span>
                      </label>
                      <div class="custom-position-controls hide">
                        <div class="row">
                          <div class="col-auto">
                            <div class="input-group mb-3">
                              <input type="number"  style="height:auto"  min="0" max="250" class="form-control" id="custom_position_x_value"
                                aria-label="Value in pixels" aria-describedby="pos-value-input_1" oninput="this.value = Math.min(Math.max(this.value, 0), 250)" />
                              <span class="input-group-text"  style="height:auto"  id="pos-value-input_1">PX</span>
                            </div>
                          </div>
                          <div class="col-auto">
                            <select class="form-select"  style="height:auto"  aria-label="Default select example">
                              <option selected value="cust-pos-to-the-right">To the right</option>
                              <option value="cust-pos-to-the-left">To the left</option>
                            </select>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-auto">
                            <div class="input-group mb-3">
                              <input type="number"  style="height:auto"  min="0" max="250" class="form-control" id="custom_position_y_value"
                                aria-label="Value in pixels" aria-describedby="pos-value-input_2" oninput="this.value = Math.min(Math.max(this.value, 0), 250)"/>
                              <span class="input-group-text"  style="height:auto"  id="pos-value-input_2">PX</span>
                            </div>
                          </div>
                          <div class="col-auto">
                            <select class="form-select"  style="height:auto"  aria-label="Default select example">
                              <option selected value="cust-pos-to-the-lower">To the bottom</option>
                              <option value="cust-pos-to-the-upper">To the top</option>
                            </select>
                          </div>
                        </div>
                        <div class="description">0 - 250px are permitted values</div>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3 row widget-position" id="position_html">
                    <label class="fcol-sm-3 col-form-label">Where would you like to place the accessibility icon on your
                      site?
                    </label>
                    <div class="col-sm-12 three-col">
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-position-top-left" name="position" value="top_left"
                          class="form-radio" />

                        <label for="edit-position-top-left" class="option">Top left</label>
                      </div>
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-position-top-center" name="position" value="top_center"
                          class="form-radio" />

                        <label for="edit-position-top-center" class="option">Top Center</label>
                      </div>
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-position-top-right" name="position" value="top_right"
                          class="form-radio" />

                        <label for="edit-position-top-right" class="option">Top Right</label>
                      </div>
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-position-middel-left" name="position" value="middel_left"
                          class="form-radio" />

                        <label for="edit-position-middel-left" class="option">Middle left</label>
                      </div>
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-position-middel-right" name="position" value="middel_right"
                          class="form-radio" />

                        <label for="edit-position-middel-right" class="option">Middle Right</label>
                      </div>
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-position-bottom-left" name="position" value="bottom_left"
                          class="form-radio" />

                        <label for="edit-position-bottom-left" class="option">Bottom left</label>
                      </div>
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-position-bottom-center" name="position" value="bottom_center"
                          class="form-radio" />

                        <label for="edit-position-bottom-center" class="option">Bottom Center</label>
                      </div>
                      <div
                        class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                        <input type="radio" id="edit-position-bottom-right" checked="" name="position"
                          value="bottom_right" class="form-radio" />

                        <label for="edit-position-bottom-right" class="option">Bottom Right</label>
                      </div>
                    </div>
                  </div>
<!-- widget icon size -->

<h3 class="text-dark">Select Widget Size:</h3>
              <div class="form-radios  mb-3">
                <div class="form-radio-item">
                  <input data-drupal-selector="edit-widget-size-regularsize" aria-describedby="edit-widget-size--description" <?php echo ('widget_size' == "0" ? "checked" : ""); ?> type="radio" id="edit-widget-size-regularsize" name="widget_size" value="0" checked="checked" class="form-radio form-boolean form-boolean--type-radio" wfd-id="id15">
                  <label for="edit-widget-size-regularsize" class="form-item__label option">Regular Size</label>
                </div>
                <div class="form-radio-item">
                  <input data-drupal-selector="edit-widget-size-oversize" aria-describedby="edit-widget-size--description" type="radio" <?php echo ('widget_size' == "1" ? "checked" : ""); ?> id="edit-widget-size-oversize" name="widget_size" value="1" class="form-radio form-boolean form-boolean--type-radio" wfd-id="id16">
                  <label for="edit-widget-size-oversize" class="form-item__label option">Oversize</label>
                </div>
                <div style="font-size: small;" id="edit-widget-size--wrapper--description" data-drupal-field-elements="description" class="fieldset__description">It only works on desktop view.</div>
              </div>
                 

                  <div class="icon-type-wrapper row " id="select_icon_type">
                    <label class="fcol-sm-12 col-form-label" style="margin-left: -10.500px; margin-right: -10.500px;color: black;">Select icon type:</label>
                    <div class="col-sm-12" style="margin-left: -15px; margin-right: -15px;">
                      <div class="row">
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-type-1" checked="" name="aioa_icon_type"
                              value="aioa-icon-type-1" class="form-radio" />
                            <label for="edit-type-1" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-1.svg"
                                width="65" height="65" style="height: 65px;" />
                              <span class="visually-hidden">Type 1</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-type-2" name="aioa_icon_type" value="aioa-icon-type-2"
                              class="form-radio" />
                            <label for="edit-type-2" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-2.svg"
                                width="65" height="65" style="height: 65px;"/>
                              <span class="visually-hidden">Type 2</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-type-3" name="aioa_icon_type" value="aioa-icon-type-3"
                              class="form-radio" />
                            <label for="edit-type-3" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-3.svg"
                                width="65" height="65" style="height: 65px;"/>
                              <span class="visually-hidden">Type 3</span>
                            </label>
                          </div>
                        </div>
                     
                      <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-type-4" name="aioa_icon_type" value="aioa-icon-type-4"
                              class="form-radio" />
                            <label for="edit-type-4" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-4.svg"
                                width="65" height="65" style="height: 65px;"/>
                              <span class="visually-hidden">Type 4</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-type-5" name="aioa_icon_type" value="aioa-icon-type-5"
                              class="form-radio" />
                            <label for="edit-type-5" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-5.svg"
                                width="65" height="65" style="height: 65px;"/>
                              <span class="visually-hidden">Type 5</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-type-6" name="aioa_icon_type" value="aioa-icon-type-6"
                              class="form-radio" />
                            <label for="edit-type-6" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-6.svg"
                                width="65" height="65" style="height: 65px;"/>
                              <span class="visually-hidden">Type 6</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-type-7" name="aioa_icon_type" value="aioa-icon-type-7"
                              class="form-radio" />
                            <label for="edit-type-7" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-7.svg"
                                width="65" height="65" style="height: 65px;"/>
                              <span class="visually-hidden">Type 7</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-type-8" name="aioa_icon_type" value="aioa-icon-type-8"
                              class="form-radio" />
                            <label for="edit-type-8" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-8.svg"
                                width="65" height="65" style="height: 65px;"/>
                              <span class="visually-hidden">Type 8</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-type-9" name="aioa_icon_type" value="aioa-icon-type-9"
                              class="form-radio" />
                            <label for="edit-type-9" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-9.svg"
                                width="65" height="65" style="height: 65px;"/>
                              <span class="visually-hidden">Type 9</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-type-10" name="aioa_icon_type" value="aioa-icon-type-10"
                              class="form-radio" />
                            <label for="edit-type-10" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-10.svg"
                                width="65" height="65" style="height: 65px;"/>
                              <span class="visually-hidden">Type 10</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-type-11" name="aioa_icon_type" value="aioa-icon-type-11"
                              class="form-radio" />
                            <label for="edit-type-11" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-11.svg"
                                width="65" height="65" style="height: 65px;"/>
                              <span class="visually-hidden">Type 11</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-type-12" name="aioa_icon_type" value="aioa-icon-type-12"
                              class="form-radio" />
                            <label for="edit-type-12" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-12.svg"
                                width="65" height="65" style="height: 65px;"/>
                              <span class="visually-hidden">Type 12</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-type-13" name="aioa_icon_type" value="aioa-icon-type-13"
                              class="form-radio" />
                            <label for="edit-type-13" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-13.svg"
                                width="65" height="65" style="height: 65px;"/>
                              <span class="visually-hidden">Type 13</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-type-14" name="aioa_icon_type" value="aioa-icon-type-14"
                              class="form-radio" />
                            <label for="edit-type-14" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-14.svg"
                                width="65" height="65" style="height: 65px;"/>
                              <span class="visually-hidden">Type 14</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-type-15" name="aioa_icon_type" value="aioa-icon-type-15"
                              class="form-radio" />
                            <label for="edit-type-15" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-15.svg"
                                width="65" height="65" style="height: 65px;"/>
                              <span class="visually-hidden">Type 15</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-type-16" name="aioa_icon_type" value="aioa-icon-type-16"
                              class="form-radio" />
                            <label for="edit-type-16" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-16.svg"
                                width="65" height="65" style="height: 65px;"/>
                              <span class="visually-hidden">Type 16</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-type-17" name="aioa_icon_type" value="aioa-icon-type-17"
                              class="form-radio" />
                            <label for="edit-type-17" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-17.svg"
                                width="65" height="65" style="height: 65px;"/>
                              <span class="visually-hidden">Type 17</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-type-18" name="aioa_icon_type" value="aioa-icon-type-18"
                              class="form-radio" />
                            <label for="edit-type-18" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-18.svg"
                                width="65" height="65" style="height: 65px;"/>
                              <span class="visually-hidden">Type 18</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-type-19" name="aioa_icon_type" value="aioa-icon-type-19"
                              class="form-radio" />
                            <label for="edit-type-19" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-19.svg"
                                width="65" height="65" style="height: 65px;"/>
                              <span class="visually-hidden">Type 19</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-type-20" name="aioa_icon_type" value="aioa-icon-type-20"
                              class="form-radio" />
                            <label for="edit-type-20" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-20.svg"
                                width="65" height="65" style="height: 65px;"/>
                              <span class="visually-hidden">Type 20</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-type-21" name="aioa_icon_type" value="aioa-icon-type-21"
                              class="form-radio" />
                            <label for="edit-type-21" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-21.svg"
                                width="65" height="65" style="height: 65px;"/>
                              <span class="visually-hidden">Type 21</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-type-22" name="aioa_icon_type" value="aioa-icon-type-22"
                              class="form-radio" />
                            <label for="edit-type-22" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-22.svg"
                                width="65" height="65" style="height: 65px;"/>
                              <span class="visually-hidden">Type 22</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-type-23" name="aioa_icon_type" value="aioa-icon-type-23"
                              class="form-radio" />
                            <label for="edit-type-23" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-23.svg"
                                width="65" height="65" style="height: 65px;"/>
                              <span class="visually-hidden">Type 23</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-type-24" name="aioa_icon_type" value="aioa-icon-type-24"
                              class="form-radio" />
                            <label for="edit-type-24" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-24.svg"
                                width="65" height="65" style="height: 65px;"/>
                              <span class="visually-hidden">Type 24</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-type-25" name="aioa_icon_type" value="aioa-icon-type-25"
                              class="form-radio" />
                            <label for="edit-type-25" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-25.svg"
                                width="65" height="65" style="height: 65px;"/>
                              <span class="visually-hidden">Type 25</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-type-26" name="aioa_icon_type" value="aioa-icon-type-26"
                              class="form-radio" />
                            <label for="edit-type-26" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-26.svg"
                                width="65" height="65" style="height: 65px;"/>
                              <span class="visually-hidden">Type 26</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-type-27" name="aioa_icon_type" value="aioa-icon-type-27"
                              class="form-radio" />
                            <label for="edit-type-27" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-27.svg"
                                width="65" height="65" style="height: 65px;"/>
                              <span class="visually-hidden">Type 27</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-type-28" name="aioa_icon_type" value="aioa-icon-type-28"
                              class="form-radio" />
                            <label for="edit-type-28" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-28.svg"
                                width="65" height="65" style="height: 65px;"/>
                              <span class="visually-hidden">Type 28</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-type-29" name="aioa_icon_type" value="aioa-icon-type-29"
                              class="form-radio" />
                            <label for="edit-type-29" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-29.svg"
                                width="65" height="65" style="height: 65px;"/>
                              <span class="visually-hidden">Type 29</span>
                            </label>
                          </div>
                        </div>
                        </div>
                     
                    </div>
                
                  <div class="icon-custom-size-wrapper mb-3 row">
                    <div class="col-sm-12">
                      <label class="custom-switcher ">
                        <span class="custom-switcher_right">
                          <input type="checkbox" id="custom-size-switcher" class="custom-switcher_inp_2" value="1" />
                          <span class="custom-switcher_body" data-bs-toggle="tooltip" data-bs-placement="bottom"
                            title="Toggle to override selected size" data-bs-custom-class="switcher-tooltip">
                          </span>
                          <span class="custom-switcher_label">Enable icon custom size:</span>
                        </span>
                      </label>
                      <div class="custom-size-controls hide">
                        <div class="row">
                         
                          </div>
                          <div class="col-auto controls">
  <label for="exact-icon-size" class="form-label">Select exact icon size:</label>
  <div class="input-group mb-2">
   <input type="number"
       class="form-control"
       style="height:auto"
       id="widget_icon_size_custom"
       name="widget_icon_size_custom"
       min="20"
       max="150"
       value=""
       aria-label="Value in pixels"
       aria-describedby="size-value-input_1"
       onblur="validateIconSize(this)" />


    <span class="input-group-text" style="height:auto" id="size-value-input_1">PX</span>
  </div>
  <div class="description">20 - 150px are permitted values</div>
</div>

                      </div>
                    </div>
                  </div>
                  <div class="icon-size-wrapper widget-icon row " id="select_icon_size">
                    <label class="fcol-sm-12 col-form-label">Select icon size for Desktop: </label>
                    
                    <div class="col-sm-12" style="padding-right: calc(var(--bs-gutter-x)* .2);padding-left: calc(var(--bs-gutter-x)* .2);">
                      <div class="row">
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-size-big" name="aioa_icon_size" value="aioa-big-icon"
                              class="form-radio" />
                            <label for="edit-size-big" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-1.svg"
                                width="75" height="75" style="height: 75px;"  class="iconimg"/>
                              <span class="visually-hidden">Big</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-size-medium" checked="" name="aioa_icon_size"
                              value="aioa-medium-icon" class="form-radio" />
                            <label for="edit-size-medium" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-1.svg"
                                width="65" height="65" style="height: 65px;"  class="iconimg"/>
                              <span class="visually-hidden">Medium</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-size-default" name="aioa_icon_size" value="aioa-default-icon"
                              class="form-radio" />
                            <label for="edit-size-default" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-1.svg"
                                width="55" height="55" style="height: 55px;"  class="iconimg"/>
                              <span class="visually-hidden">Default</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-size-small" name="aioa_icon_size" value="aioa-small-icon"
                              class="form-radio" />
                            <label for="edit-size-small" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-1.svg"
                                width="45" height="45" style="height: 45px;"  class="iconimg"/>
                              <span class="visually-hidden">Small</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-size-extra-small" name="aioa_icon_size"
                              value="aioa-extra-small-icon" class="form-radio" />
                            <label for="edit-size-extra-small" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-1.svg"
                                width="35" height="35" style="height: 35px;"   class="iconimg"/>
                              <span class="visually-hidden">Extra Small</span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="icon-size-wrapper row" style="display: none">
                    <label class="fcol-sm-12 col-form-label">Select icon size for mobile: </label>
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-size-big" name="aioa_icon_size_mb" value="aioa-big-icon-mb"
                              class="form-radio" />
                            <label for="edit-size-big" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-1.svg"
                                width="75" height="75" />
                              <span class="visually-hidden">Big</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-size-medium" checked="" name="aioa_icon_size_mb"
                              value="aioa-medium-icon-mb" class="form-radio" />
                            <label for="edit-size-medium" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-1.svg"
                                width="65" height="65" />
                              <span class="visually-hidden">Medium</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-size-default" name="aioa_icon_size_mb"
                              value="aioa-default-icon-mb" class="form-radio" />
                            <label for="edit-size-default" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-1.svg"
                                width="55" height="55" />
                              <span class="visually-hidden">Default</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-size-small" name="aioa_icon_size_mb" value="aioa-small-icon-mb"
                              class="form-radio" />
                            <label for="edit-size-small" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-1.svg"
                                width="45" height="45" />
                              <span class="visually-hidden">Small</span>
                            </label>
                          </div>
                        </div>
                        <div class="col-auto mb-30">
                          <div
                            class="js-form-item form-item js-form-type-radio form-type-radio js-form-item-position form-item-position">
                            <input type="radio" id="edit-size-extra-small" name="aioa_icon_size_mb"
                              value="aioa-extra-small-icon-mb" class="form-radio" />
                            <label for="edit-size-extra-small" class="option">
                              <img src="https://www.skynettechnologies.com/sites/default/files/aioa-icon-type-1.svg"
                                width="35" height="35"  />
                              <span class="visually-hidden">Extra Small</span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
 <div class="save-changes-btn">
                    <button type="button" id="submit" onclick="f1()" class="btn btn-primary">Save Changes</button>
                  </div>

                  <div class="mt-3 row " id="save-changes-success">
                    <div class="col-sm-12">
                      <div class="form-text">It may take a few seconds for changes to appear on your website. If you
                        don't see the changes, try clearing your browser cache or checking in a private browsing window.
                      </div>
                    </div>
                  </div>
                  </div>

                 
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  
<script>

function validateIconSize(input) {
    let value = parseInt(input.value, 10);
    if (isNaN(value)) {
      input.value = 20; // Default value if empty or invalid
    } else if (value < 20) {
      input.value = 20;
    } else if (value > 150) {
      input.value = 150;
    }
  }


 // Listen for messages from the parent page
    
            // const domain = window.location.hostname;
            const domain = window.location.hostname;
           


// Load settings from sessionStorage or cookies

 var domain_name = domain;
 console.log("domain : "+domain);
const defaultSettings = {
  widget_position: "bottom_right",
  widget_color_code: "#861818",
  widget_icon_type: "aioa-icon-type-1",
  widget_icon_size: "aioa-small-icon",
};

// Load settings from sessionStorage or cookies

 var domain_name = domain;

// var domain_name = document.getElementById('domain-list').options[0].text;
var website_name = btoa(domain_name);
     
        fetchApiResponse(domain_name);
      // Fetch API response for the updated domain
    // Set the initial domain name and fetch API response on page load

		document.addEventListener('DOMContentLoaded', function() {
       
         website_name = btoa(domain_name);

        fetchApiResponse(domain_name);
      
        // Fetch initial response for the default domain
    });

    // Function to update the domain name on dropdown change
   

    // Function to fetch API response using POST
    function fetchApiResponse(domain_name) {
        const apiUrl = "https://ada.skynettechnologies.us/api/widget-settings";
        
        fetch(apiUrl, {
            method: "POST",
            headers: {
                "Content-Type": "application/json" // Specify the content type
            },
            body: JSON.stringify({ website_url: domain_name }) // Pass the domain name in the request body
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json(); // Parse the JSON response
            })
                    .then((result) => {
            // Check if result and result.Data are valid
            if (result && result.Data && Object.keys(result.Data).length > 0) {
             console.log(result.Data);
              const settings = {
                  widget_position: result.Data.widget_position || defaultSettings.widget_position,
                  widget_color_code: result.Data.widget_color_code || defaultSettings.widget_color_code,
                  widget_icon_type: result.Data.widget_icon_type || defaultSettings.widget_icon_type,
                  widget_icon_size: result.Data.widget_icon_size || defaultSettings.widget_icon_size,
                  widget_size: result.Data.widget_size || defaultSettings.widget_size,
                  widget_icon_size_custom: result.Data.widget_icon_size_custom || defaultSettings.widget_icon_size_custom,
                  is_widget_custom_size: result.Data.is_widget_custom_size || defaultSettings.is_widget_custom_size,
                  is_widget_custom_position: result.Data.is_widget_custom_position || defaultSettings.is_widget_custom_position,
                  widget_position_top: result.Data.widget_position_top || 0,
                  widget_position_bottom: result.Data.widget_position_bottom || 0,
                  widget_position_left: result.Data.widget_position_left || 0,
                  widget_position_right: result.Data.widget_position_right || 0,
                };
             
                populateSettings(settings);
                populatecustom(settings);
              // You can process the settings here or pass them to another function
            } else {
             
          
            }
          })
            .catch(error => {
                console.error("Error fetching API:", error);
                // Handle error scenarios like invalid response or network issues
            });
    }
function fetchSettings() {
  const requestOptions = {
  method: "POST",
  redirect: "follow"
};

fetch(`https://ada.skynettechnologies.us/api/widget-settings?website_url=${domain_name}`, requestOptions)
  .then((response) => {
    if (!response.ok) {
      throw new Error("Network response was not ok");
    }
    return response.json(); // Parse JSON response
  })
  .then((result) => {
    // Check if result and result.Data are valid
    if (result && result.Data && Object.keys(result.Data).length > 0) {
      console.log("Widget settings fetched:", result.Data);
    } else {
      
    }
  })
  .catch((error) => {
    console.error("Error fetching widget settings:", error);
    alert("Failed to fetch settings. Using default values.");
    
  });

  
}


// Populate form fields with settings
function populateSettings(settings) {

 // custom size switcher
  if (settings.is_widget_custom_size === 1) {
    $("#custom-size-switcher").prop("checked", true); // Check the checkbox
    $(".custom-size-controls").removeClass("hide"); // Show custom size controls
    $(".widget-icon").addClass("hide"); // Hide widget icon
  } else {
    console.log("settings1"+settings.is_widget_custom_size);
    $("#custom-size-switcher").prop("checked", false); // Uncheck the checkbox
    $(".custom-size-controls").addClass("hide"); // Hide custom size controls
    $(".widget-icon").removeClass("hide"); // Show widget icon
  }

  // Toggle behavior for #custom-size-switcher
  $("#custom-size-switcher").click(function () {


    settings.is_widget_custom_size = $(this).is(":checked") ? 1 : 0; // Update the value
    if (settings.is_widget_custom_size === 1) {
      $(".custom-size-controls").removeClass("hide");
      $(".widget-icon").addClass("hide");
    } else {
      console.log("settings2"+settings.is_widget_custom_size);
      $(".custom-size-controls").addClass("hide");
      $(".widget-icon").removeClass("hide");
    }
  });

  // Simulated API update after fetching settings
  setTimeout(() => {
   
    $("#custom-size-switcher").prop("checked", settings.is_widget_custom_size === 1);
    if (settings.is_widget_custom_size === 1) {
      $(".custom-size-controls").removeClass("hide");
      $(".widget-icon").addClass("hide");
    } else {
      console.log("settings3"+settings.is_widget_custom_size);
      $(".custom-size-controls").addClass("hide");
      $(".widget-icon").removeClass("hide");
    }
  }, 1000);


// custom position switcher
if (settings.is_widget_custom_position === 1) {
  $("#custom-position-switcher").prop("checked", true); // Check the checkbox
  $(".custom-position-controls").removeClass("hide"); // Show custom size controls
  $(".widget-position").addClass("hide"); // Hide widget icon
} else {
  console.log("settings1"+settings.is_widget_custom_position);
  $("#custom-position-switcher").prop("checked", false); // Uncheck the checkbox
  $(".custom-position-controls").addClass("hide"); // Hide custom size controls
  $(".widget-position").removeClass("hide"); // Show widget icon
}

// Toggle behavior for #custom-size-switcher
$("#custom-position-switcher").click(function () {


  settings.is_widget_custom_position = $(this).is(":checked") ? 1 : 0; // Update the value
  if (settings.is_widget_custom_position === 1) {
    $(".custom-position-controls").removeClass("hide");
    $(".widget-position").addClass("hide");
  } else {
    console.log("settings2"+settings.is_widget_custom_position);
    $(".custom-position-controls").addClass("hide");
    $(".widget-position").removeClass("hide");
  }
});

// Simulated API update after fetching settings
setTimeout(() => {
 
  $("#custom-position-switcher").prop("checked", settings.is_widget_custom_position === 1);
  if (settings.is_widget_custom_position === 1) {
    $(".custom-position-controls").removeClass("hide");
    $(".widget-position").addClass("hide");
  } else {
    console.log("settings3"+settings.is_widget_custom_position);
    $(".custom-position-controls").addClass("hide");
    $(".widget-position").removeClass("hide");
  }
}, 1000);

// end size position




   const colorField = document.getElementById("colorcode");
  if (colorField) {
    colorField.value = settings.widget_color_code;
  }
  const typeOptions = document.querySelectorAll('input[name="aioa_icon_type"]');

  typeOptions.forEach((option) => {
    if (option.value === settings.widget_icon_type) {
      option.checked = true;
    }
  });

  const sizeOptions = document.querySelectorAll('input[name="aioa_icon_size"]');
  sizeOptions.forEach((option) => {
    if (option.value === settings.widget_icon_size) {
      option.checked = true;
    }
  });
 
  const iconImg = `https://www.skynettechnologies.com/sites/default/files/${settings.widget_icon_type}.svg`;
 
  $(".iconimg").attr("src", iconImg);

  const widget_icon_size_custom = document.getElementById("widget_icon_size_custom");

  if (widget_icon_size_custom) {
    widget_icon_size_custom.value = settings.widget_icon_size_custom;
  }
  const positionRadio = document.querySelector(`input[name="position"][value="${settings.widget_position}"]`);
  if (positionRadio) {
    positionRadio.checked = true;
  }
  const widget_size = document.querySelector(`input[name="widget_size"][value="${settings.widget_size}"]`);
  if (widget_size) {
    widget_size.checked = true;
  }

  // Set custom position fields
  const customPositionXField = document.getElementById("custom_position_x_value");

  const xDirectionSelect = $(".custom-position-controls select")[0];
    
if (customPositionXField && xDirectionSelect) {
  if (settings.widget_position_right > 0) {
    customPositionXField.value = settings.widget_position_right;
    xDirectionSelect.value = "cust-pos-to-the-right";
  } else if (settings.widget_position_left > 0) {
    customPositionXField.value = settings.widget_position_left;
    xDirectionSelect.value = "cust-pos-to-the-left";
  } else {
    customPositionXField.value = 0;
    xDirectionSelect.value = "cust-pos-to-the-right"; // Default direction
  }
}


const customPositionYField = document.getElementById("custom_position_y_value");

const yDirectionSelect = $(".custom-position-controls select")[1];
if (customPositionYField && yDirectionSelect) {
  if (settings.widget_position_bottom > 0) {
    customPositionYField.value = settings.widget_position_bottom;
    yDirectionSelect.value = "cust-pos-to-the-lower";
  } else if (settings.widget_position_top > 0) {
    customPositionYField.value = settings.widget_position_top;
    yDirectionSelect.value = "cust-pos-to-the-upper";
  } else {
    customPositionYField.value = 0;
    yDirectionSelect.value = "cust-pos-to-the-lower"; // Default direction
  }
}

}


// Fetch settings when the page loads
window.onload = function () {
  fetchSettings();
  domain_name = domain;
 
      website_name = btoa(domain_name);
    
      fetchApiResponse(domain_name);
   

};

   

    const sizeOptions = document.querySelectorAll('input[name="aioa_icon_size"]');
    const sizeOptionsImg = document.querySelectorAll('input[name="aioa_icon_size"] + label img');
    const typeOptions = document.querySelectorAll('input[name="aioa_icon_type"]');
    const positionOptions = document.querySelectorAll('input[name="position"]');
    const custSizePreview = document.querySelector(".custom-size-preview img");
    const custSizePreviewLabel = document.querySelector(".custom-size-preview .value span");

    // Set default value to custom position inputs
    var positions = {
      top_left: [20, 20],
      middel_left: [20, 50],
      bottom_center: [50, 20],
      top_center: [50, 20],
      middel_right: [20, 50],
      bottom_right: [20, 20],
      top_right: [20, 20],
      bottom_left: [20, 20],
    };
    positionOptions.forEach((option) => {
      var ico_position = document.querySelector('input[name="position"]:checked').value;
      document.getElementById("custom_position_x_value").value = positions[ico_position][0];
      document.getElementById("custom_position_y_value").value = positions[ico_position][1];
      option.addEventListener("click", (event) => {
        var ico_position = document.querySelector('input[name="position"]:checked').value;
        document.getElementById("custom_position_x_value").value = positions[ico_position][0];
        document.getElementById("custom_position_y_value").value = positions[ico_position][1];
      });
    });

    // Set icon on type select
    typeOptions.forEach((option) => {
      option.addEventListener("click", (event) => {
        var ico_type = document.querySelector('input[name="aioa_icon_type"]:checked').value;
      
        sizeOptionsImg.forEach((option2) => {
          option2.setAttribute("src", "https://www.skynettechnologies.com/sites/default/files/" + ico_type + ".svg");
        });
        custSizePreview.setAttribute("src", "https://www.skynettechnologies.com/sites/default/files/" + ico_type + ".svg");
      });
    });

    // Set icon on size select
    sizeOptions.forEach((option) => {
      var ico_size_value = document
        .querySelector('input[name="aioa_icon_size"]:checked + label img')
        .getAttribute("width");
        
      // Set default value to custom size input
      const widget_icon_size_custom = document.getElementById("widget_icon_size_custom");
      document.getElementById("widget_icon_size_custom").value = widget_icon_size_custom;
    
   
      option.addEventListener("click", (event) => {
        var ico_width = document
          .querySelector('input[name="aioa_icon_size"]:checked + label img')
          .getAttribute("width");
        var ico_height = document
          .querySelector('input[name="aioa_icon_size"]:checked + label img')
          .getAttribute("height");
        custSizePreview.setAttribute("width", ico_width);
        custSizePreview.setAttribute("height", ico_height);
        document.getElementById("widget_icon_size_custom").value = ico_width;
        custSizePreviewLabel.innerHTML = ico_width;
      });
    });

    // Set icons size on input change
    document.getElementById("widget_icon_size_custom").addEventListener("input", function () {
      var ico_size_value = document.getElementById("widget_icon_size_custom").value;
      if (ico_size_value >= 20 && ico_size_value <= 150) {
        custSizePreview.setAttribute("width", ico_size_value);
        custSizePreview.setAttribute("height", ico_size_value);
        custSizePreviewLabel.innerHTML = ico_size_value;
      }
   
  });




// <!-- API -->
                              


    
      $('input[name="position"]').change(function () {
        var icon_position = document.querySelector('input[name="position"]:checked').value;
      });

      $('input[name="aioa_icon_type"]').change(function () {
        var icon_type = document.querySelector('input[name="aioa_icon_type"]:checked').value;
      });
      $('input[name="aioa_icon_size"]').change(function () {
        var icon_size = document.querySelector('input[name="aioa_icon_size"]:checked').value;
      });

      
      var colorcode = $("#colorcode").val();
      if (colorcode == "") {
        colorcode = "420083";
      }
      var icon_position = document.querySelector('input[name="position"]:checked').value;
      var icon_type = document.querySelector('input[name="aioa_icon_type"]:checked').value;
      var icon_size = document.querySelector('input[name="aioa_icon_size"]:checked').value;
      
     



    $('#license_key,#colorcode').change(function () {
      var license_key = $("#license_key").val();
      var colorcode = $("#colorcode").val();
      //var checkedValue = $('.messageCheckbox:checked').val();
    })
    $('input[name="position"]').change(function () {
      var icon_position = document.querySelector('input[name="position"]:checked').value;
    });
    // $('input[name="website"]').change(function () {
    //   var website_dropdown = document.querySelector('input[name="website"]:selected').value;

    // });


    $('input[name="aioa_icon_type"]').change(function () {
      var icon_type = document.querySelector('input[name="aioa_icon_type"]:checked').value;
      
    });
    $('input[name="aioa_icon_size"]').change(function () {
      var icon_size = document.querySelector('input[name="aioa_icon_size"]:checked').value;
      
    });
    
   

    

// Set the initial server name and display it
document.addEventListener('DOMContentLoaded', function() {
          var server_name = domain
        });

        // Function to update the server name on dropdown change
       






// Declare variables in the global scope so they can be accessed throughout
let is_widget_custom_position = 0;
let is_widget_custom_size = 0;

function populatecustom(settings) {
    console.log(settings.is_widget_custom_size);

    // Fetch the settings value for custom position and set the checkbox state
    is_widget_custom_position = settings.is_widget_custom_position !== undefined ? settings.is_widget_custom_position : 0;
    $("#custom-position-switcher").prop("checked", is_widget_custom_position === 1);
    console.log("Initial Custom Position Switcher:", is_widget_custom_position);

    // Fetch the settings value for custom size and set the checkbox state
    is_widget_custom_size = settings.is_widget_custom_size !== undefined ? settings.is_widget_custom_size : 0;
    $("#custom-size-switcher").prop("checked", is_widget_custom_size === 1);
    console.log("Initial Custom Size Switcher:", is_widget_custom_size);

    // Handle click event for custom position switcher
    $("#custom-position-switcher").click(function () {
        // Set value based on checkbox state
        is_widget_custom_position = $(this).is(":checked") ? 1 : 0;
        console.log("Custom Position Switcher:", is_widget_custom_position);
    });

    // Handle click event for custom size switcher
    $("#custom-size-switcher").click(function () {
        // Set value based on checkbox state
        is_widget_custom_size = $(this).is(":checked") ? 1 : 0;
        console.log("Custom Size Switcher:", is_widget_custom_size);
    });
}



       
    function f1() {
      var server_name = domain;
      
       var colorcode = $("#colorcode").val();
  var icon_position = document.querySelector('input[name="position"]:checked').value;
  var icon_type = document.querySelector('input[name="aioa_icon_type"]:checked').value;
  var icon_size = document.querySelector('input[name="aioa_icon_size"]:checked').value;
  var widget_size = document.querySelector('input[name="widget_size"]:checked').value;
  var widget_icon_size_custom = $("#widget_icon_size_custom").val();
  
  const custom_position_x = $("#custom_position_x_value").val() || 0;
  const custom_position_y = $("#custom_position_y_value").val() || 0;
  const x_position_direction = $(".custom-position-controls select").eq(0).val();
  const y_position_direction = $(".custom-position-controls select").eq(1).val();
  
  let widget_position_right = null;
  let widget_position_left = null;
  let widget_position_top = null;
  let widget_position_bottom = null;
  
  if (x_position_direction === "cust-pos-to-the-right") {
      widget_position_right = custom_position_x;
  } else if (x_position_direction === "cust-pos-to-the-left") {
      widget_position_left = custom_position_x;
  }
  
  if (y_position_direction === "cust-pos-to-the-lower") {
      widget_position_bottom = custom_position_y;
  } else if (y_position_direction === "cust-pos-to-the-upper") {
      widget_position_top = custom_position_y;
  }
  
  var params = new URLSearchParams({
      u: server_name,
      widget_position: icon_position,
      is_widget_custom_position: is_widget_custom_position,
      is_widget_custom_size: is_widget_custom_size,
      widget_color_code: colorcode,
      widget_icon_type: icon_type,
      widget_icon_size: icon_size,
      widget_size: widget_size,
      widget_icon_size_custom: widget_icon_size_custom,
      widget_position_right: widget_position_right,
      widget_position_left: widget_position_left,
      widget_position_top: widget_position_top,
      widget_position_bottom: widget_position_bottom
  }).toString();
  
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'https://ada.skynettechnologies.us/api/widget-setting-update-platform', true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  
  xhr.onload = function () {
      if (xhr.status === 200) {
          alert('Settings updated successfully!');
          location.reload();
      } else {
          console.error('Error: ', xhr.status, xhr.statusText);
          alert('Error: Unable to update settings.');
      }
  };
  
  xhr.onerror = function () {
      alert('Request failed. Please check your network connection.');
      console.error('Request error:', xhr);
  };
  
  xhr.send(params);
  
};



  </script>