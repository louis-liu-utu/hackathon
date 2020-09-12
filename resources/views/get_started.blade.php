@extends('layouts.app')

@section('title', 'Request Access')

@section('description', '')



@section('content')
    <section class="signup container">
        <h1 class="main-title">Be part of the movement</h1>
        <div class="form-list">
            <form  method="post" novalidate>
                @csrf



                <div class="input-fill-x">
                    <input type="text" name="first_name" value="{{old('first_name')}}" class="input-control input-fill" placeholder="First Name" required>
                    <label class="input-label label-require">First Name</label>
                    <div class="error"  @error('first_name') style="display: block;" @enderror>@error('first_name') {{$message}} @enderror</div>
                </div>
                <div class="input-fill-x">
                    <input type="text" name="last_name" value="{{old('last_name')}}"  class="input-control input-fill" placeholder="Last Name" required>
                    <label class="input-label label-require" >Last Name</label>
                    <div class="error" @error('last_name') style="display: block;" @enderror>@error('last_name') {{$message}} @enderror</div>
                </div>
                <div class="input-fill-x">
                    <input type="email" name="email" value="{{old('email')}}"  class="input-control input-fill"  placeholder="Email Name" required>
                    <label class="input-label label-require">Email Address</label>
                    <div class="error" @error('email') style="display: block;" @enderror > @error('email') {{$message}} @enderror </div>
                </div>
                <div class="input-fill-x">
                    <select name="country" class="input-fill select-control"  required>
                        <option {{old('country') === 'Curaco' ? 'selected' : ''}}  value="" disabled selected></option>
                        <option {{old('country') === 'Afganistan' ? 'selected' : ''}}  value="Afganistan">Afghanistan</option>
                        <option {{old('country') === 'Albania' ? 'selected' : ''}} value="Albania">Albania</option>
                        <option {{old('country') === 'Algeria' ? 'selected' : ''}} value="Algeria">Algeria</option>
                        <option {{old('country') === 'American Samoa' ? 'selected' : ''}} value="American Samoa">American Samoa</option>
                        <option {{old('country') === 'Andorra' ? 'selected' : ''}} value="Andorra">Andorra</option>
                        <option {{old('country') === 'Angola' ? 'selected' : ''}} value="Angola">Angola</option>
                        <option {{old('country') === 'Anguilla' ? 'selected' : ''}} value="Anguilla">Anguilla</option>
                        <option {{old('country') === 'Antigua & Barbuda' ? 'selected' : ''}} value="Antigua & Barbuda">Antigua & Barbuda</option>
                        <option {{old('country') === 'Argentina' ? 'selected' : ''}} value="Argentina">Argentina</option>
                        <option {{old('country') === 'Armenia' ? 'selected' : ''}} value="Armenia">Armenia</option>
                        <option {{old('country') === 'Aruba' ? 'selected' : ''}} value="Aruba">Aruba</option>
                        <option {{old('country') === 'Australia' ? 'selected' : ''}} value="Australia">Australia</option>
                        <option {{old('country') === 'Austria' ? 'selected' : ''}} value="Austria">Austria</option>
                        <option {{old('country') === 'Azerbaijan' ? 'selected' : ''}} value="Azerbaijan">Azerbaijan</option>
                        <option {{old('country') === 'Bahamas' ? 'selected' : ''}} value="Bahamas">Bahamas</option>
                        <option {{old('country') === 'Bahrain' ? 'selected' : ''}} value="Bahrain">Bahrain</option>
                        <option {{old('country') === 'Bangladesh' ? 'selected' : ''}} value="Bangladesh">Bangladesh</option>
                        <option {{old('country') === 'Barbados' ? 'selected' : ''}} value="Barbados">Barbados</option>
                        <option {{old('country') === 'Belarus' ? 'selected' : ''}} value="Belarus">Belarus</option>
                        <option {{old('country') === 'Belgium' ? 'selected' : ''}} value="Belgium">Belgium</option>
                        <option {{old('country') === 'Belize' ? 'selected' : ''}} value="Belize">Belize</option>
                        <option {{old('country') === 'Benin' ? 'selected' : ''}} value="Benin">Benin</option>
                        <option {{old('country') === 'Bermuda' ? 'selected' : ''}} value="Bermuda">Bermuda</option>
                        <option {{old('country') === 'Bhutan' ? 'selected' : ''}} value="Bhutan">Bhutan</option>
                        <option {{old('country') === 'Bolivia' ? 'selected' : ''}} value="Bolivia">Bolivia</option>
                        <option {{old('country') === 'Bonaire' ? 'selected' : ''}} value="Bonaire">Bonaire</option>
                        <option {{old('country') === 'Bosnia & Herzegovina' ? 'selected' : ''}} value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                        <option {{old('country') === 'Botswana' ? 'selected' : ''}} value="Botswana">Botswana</option>
                        <option {{old('country') === 'Brazil' ? 'selected' : ''}} value="Brazil">Brazil</option>
                        <option {{old('country') === 'British Indian Ocean Ter' ? 'selected' : ''}} value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                        <option {{old('country') === 'Brunei' ? 'selected' : ''}} value="Brunei">Brunei</option>
                        <option {{old('country') === 'Bulgaria' ? 'selected' : ''}} value="Bulgaria">Bulgaria</option>
                        <option {{old('country') === 'Burkina Faso' ? 'selected' : ''}} value="Burkina Faso">Burkina Faso</option>
                        <option {{old('country') === 'Burundi' ? 'selected' : ''}} value="Burundi">Burundi</option>
                        <option {{old('country') === 'Cambodia' ? 'selected' : ''}} value="Cambodia">Cambodia</option>
                        <option {{old('country') === 'Cameroon' ? 'selected' : ''}} value="Cameroon">Cameroon</option>
                        <option {{old('country') === 'Canada' ? 'selected' : ''}} value="Canada">Canada</option>
                        <option {{old('country') === 'Canary Islands' ? 'selected' : ''}} value="Canary Islands">Canary Islands</option>
                        <option {{old('country') === 'Cape Verde' ? 'selected' : ''}} value="Cape Verde">Cape Verde</option>
                        <option {{old('country') === 'Cayman Islands' ? 'selected' : ''}} value="Cayman Islands">Cayman Islands</option>
                        <option {{old('country') === 'Central African Republic' ? 'selected' : ''}} value="Central African Republic">Central African Republic</option>
                        <option {{old('country') === 'Chad' ? 'selected' : ''}} value="Chad">Chad</option>
                        <option {{old('country') === 'Channel Islands' ? 'selected' : ''}} value="Channel Islands">Channel Islands</option>
                        <option {{old('country') === 'Chile' ? 'selected' : ''}} value="Chile">Chile</option>
                        <option {{old('country') === 'China' ? 'selected' : ''}} value="China">China</option>
                        <option {{old('country') === 'Christmas Island' ? 'selected' : ''}} value="Christmas Island">Christmas Island</option>
                        <option {{old('country') === 'Cocos Island' ? 'selected' : ''}} value="Cocos Island">Cocos Island</option>
                        <option {{old('country') === 'Colombia' ? 'selected' : ''}} value="Colombia">Colombia</option>
                        <option {{old('country') === 'Comoros' ? 'selected' : ''}} value="Comoros">Comoros</option>
                        <option {{old('country') === 'Congo' ? 'selected' : ''}} value="Congo">Congo</option>
                        <option {{old('country') === 'Cook Islands' ? 'selected' : ''}} value="Cook Islands">Cook Islands</option>
                        <option {{old('country') === 'Costa Rica' ? 'selected' : ''}} value="Costa Rica">Costa Rica</option>
                        <option {{old('country') === 'Cote DIvoire' ? 'selected' : ''}} value="Cote DIvoire">Cote DIvoire</option>
                        <option {{old('country') === 'Croatia' ? 'selected' : ''}} value="Croatia">Croatia</option>
                        <option {{old('country') === 'Cuba' ? 'selected' : ''}} value="Cuba">Cuba</option>
                        <option {{old('country') === 'Curaco' ? 'selected' : ''}} value="Curaco">Curacao</option>
                        <option {{old('country') === 'Cyprus' ? 'selected' : ''}} value="Cyprus">Cyprus</option>
                        <option {{old('country') === 'Czech Republic' ? 'selected' : ''}} value="Czech Republic">Czech Republic</option>
                        <option {{old('country') === 'Denmark' ? 'selected' : ''}} value="Denmark">Denmark</option>
                        <option {{old('country') === 'Djibouti' ? 'selected' : ''}} value="Djibouti">Djibouti</option>
                        <option {{old('country') === 'Dominica' ? 'selected' : ''}} value="Dominica">Dominica</option>
                        <option {{old('country') === 'Dominican Republic' ? 'selected' : ''}} value="Dominican Republic">Dominican Republic</option>
                        <option {{old('country') === 'East Timor' ? 'selected' : ''}} value="East Timor">East Timor</option>
                        <option {{old('country') === 'Ecuador' ? 'selected' : ''}} value="Ecuador">Ecuador</option>
                        <option {{old('country') === 'Egypt' ? 'selected' : ''}} value="Egypt">Egypt</option>
                        <option {{old('country') === 'El Salvador' ? 'selected' : ''}} value="El Salvador">El Salvador</option>
                        <option {{old('country') === 'Equatorial Guinea' ? 'selected' : ''}} value="Equatorial Guinea">Equatorial Guinea</option>
                        <option {{old('country') === 'Eritrea' ? 'selected' : ''}} value="Eritrea">Eritrea</option>
                        <option {{old('country') === 'Estonia' ? 'selected' : ''}}  value="Estonia">Estonia</option>
                        <option {{old('country') === 'Ethiopia' ? 'selected' : ''}}  value="Ethiopia">Ethiopia</option>
                        <option {{old('country') === 'Falkland Islands' ? 'selected' : ''}}  value="Falkland Islands">Falkland Islands</option>
                        <option {{old('country') === 'Faroe Islands' ? 'selected' : ''}}  value="Faroe Islands">Faroe Islands</option>
                        <option {{old('country') === 'Fiji' ? 'selected' : ''}}  value="Fiji">Fiji</option>
                        <option {{old('country') === 'Finland' ? 'selected' : ''}}  value="Finland">Finland</option>
                        <option {{old('country') === 'France' ? 'selected' : ''}}  value="France">France</option>
                        <option {{old('country') === 'French Guiana' ? 'selected' : ''}}  value="French Guiana">French Guiana</option>
                        <option {{old('country') === 'French Polynesia' ? 'selected' : ''}}  value="French Polynesia">French Polynesia</option>
                        <option {{old('country') === 'French Southern Ter' ? 'selected' : ''}}  value="French Southern Ter">French Southern Ter</option>
                        <option {{old('country') === 'Gabon' ? 'selected' : ''}}  value="Gabon">Gabon</option>
                        <option {{old('country') === 'Gambia' ? 'selected' : ''}}  value="Gambia">Gambia</option>
                        <option {{old('country') === 'Georgia' ? 'selected' : ''}}  value="Georgia">Georgia</option>
                        <option {{old('country') === 'Germany' ? 'selected' : ''}}  value="Germany">Germany</option>
                        <option {{old('country') === 'Ghana' ? 'selected' : ''}}  value="Ghana">Ghana</option>
                        <option {{old('country') === 'Gibraltar' ? 'selected' : ''}}  value="Gibraltar">Gibraltar</option>
                        <option {{old('country') === 'Great Britain' ? 'selected' : ''}}  value="Great Britain">Great Britain</option>
                        <option {{old('country') === 'Greece' ? 'selected' : ''}}  value="Greece">Greece</option>
                        <option {{old('country') === 'Greenland' ? 'selected' : ''}}  value="Greenland">Greenland</option>
                        <option {{old('country') === 'Grenada' ? 'selected' : ''}}  value="Grenada">Grenada</option>
                        <option {{old('country') === 'Guadeloupe' ? 'selected' : ''}}  value="Guadeloupe">Guadeloupe</option>
                        <option {{old('country') === 'Guam' ? 'selected' : ''}}  value="Guam">Guam</option>
                        <option {{old('country') === 'Guatemala' ? 'selected' : ''}}  value="Guatemala">Guatemala</option>
                        <option {{old('country') === 'Guinea' ? 'selected' : ''}}  value="Guinea">Guinea</option>
                        <option {{old('country') === 'Guyana' ? 'selected' : ''}}  value="Guyana">Guyana</option>
                        <option {{old('country') === 'Haiti' ? 'selected' : ''}}  value="Haiti">Haiti</option>
                        <option {{old('country') === 'Hawaii' ? 'selected' : ''}}  value="Hawaii">Hawaii</option>
                        <option {{old('country') === 'Honduras' ? 'selected' : ''}}  value="Honduras">Honduras</option>
                        <option {{old('country') === 'Hong Kong' ? 'selected' : ''}}  value="Hong Kong">Hong Kong</option>
                        <option {{old('country') === 'Hungary' ? 'selected' : ''}}  value="Hungary">Hungary</option>
                        <option {{old('country') === 'Iceland' ? 'selected' : ''}}  value="Iceland">Iceland</option>
                        <option {{old('country') === 'Indonesia' ? 'selected' : ''}}  value="Indonesia">Indonesia</option>
                        <option {{old('country') === 'India' ? 'selected' : ''}}  value="India">India</option>
                        <option {{old('country') === 'Iran' ? 'selected' : ''}}  value="Iran">Iran</option>
                        <option {{old('country') === 'Iraq' ? 'selected' : ''}}  value="Iraq">Iraq</option>
                        <option {{old('country') === 'Ireland' ? 'selected' : ''}}  value="Ireland">Ireland</option>
                        <option {{old('country') === 'Isle of Man' ? 'selected' : ''}}  value="Isle of Man">Isle of Man</option>
                        <option {{old('country') === 'Israel' ? 'selected' : ''}}  value="Israel">Israel</option>
                        <option {{old('country') === 'Italy' ? 'selected' : ''}}  value="Italy">Italy</option>
                        <option {{old('country') === 'Jamaica' ? 'selected' : ''}}  value="Jamaica">Jamaica</option>
                        <option {{old('country') === 'Japan' ? 'selected' : ''}}  value="Japan">Japan</option>
                        <option {{old('country') === 'Jordan' ? 'selected' : ''}}  value="Jordan">Jordan</option>
                        <option {{old('country') === 'Kazakhstan' ? 'selected' : ''}}  value="Kazakhstan">Kazakhstan</option>
                        <option {{old('country') === 'Kenya' ? 'selected' : ''}}  value="Kenya">Kenya</option>
                        <option {{old('country') === 'Kiribati' ? 'selected' : ''}}  value="Kiribati">Kiribati</option>
                        <option {{old('country') === 'Korea North' ? 'selected' : ''}}  value="Korea North">Korea North</option>
                        <option {{old('country') === 'Korea Sout' ? 'selected' : ''}}  value="Korea Sout">Korea South</option>
                        <option {{old('country') === 'Kuwait' ? 'selected' : ''}}  value="Kuwait">Kuwait</option>
                        <option {{old('country') === 'Kyrgyzstan' ? 'selected' : ''}}  value="Kyrgyzstan">Kyrgyzstan</option>
                        <option {{old('country') === 'Laos' ? 'selected' : ''}}  value="Laos">Laos</option>
                        <option {{old('country') === 'Latvia' ? 'selected' : ''}}  value="Latvia">Latvia</option>
                        <option {{old('country') === 'Lebanon' ? 'selected' : ''}}  value="Lebanon">Lebanon</option>
                        <option {{old('country') === 'Lesotho' ? 'selected' : ''}}  value="Lesotho">Lesotho</option>
                        <option {{old('country') === 'Liberia' ? 'selected' : ''}}  value="Liberia">Liberia</option>
                        <option {{old('country') === 'Libya' ? 'selected' : ''}}  value="Libya">Libya</option>
                        <option {{old('country') === 'Liechtenstein' ? 'selected' : ''}}  value="Liechtenstein">Liechtenstein</option>
                        <option {{old('country') === 'Lithuania' ? 'selected' : ''}}  value="Lithuania">Lithuania</option>
                        <option {{old('country') === 'Luxembourg' ? 'selected' : ''}}  value="Luxembourg">Luxembourg</option>
                        <option {{old('country') === 'Macau' ? 'selected' : ''}}  value="Macau">Macau</option>
                        <option {{old('country') === 'Macedonia' ? 'selected' : ''}}  value="Macedonia">Macedonia</option>
                        <option {{old('country') === 'Madagascar' ? 'selected' : ''}}  value="Madagascar">Madagascar</option>
                        <option {{old('country') === 'Malaysia' ? 'selected' : ''}}  value="Malaysia">Malaysia</option>
                        <option {{old('country') === 'Malawi' ? 'selected' : ''}}  value="Malawi">Malawi</option>
                        <option {{old('country') === 'Maldives' ? 'selected' : ''}}  value="Maldives">Maldives</option>
                        <option {{old('country') === 'Mali' ? 'selected' : ''}}  value="Mali">Mali</option>
                        <option {{old('country') === 'Malta' ? 'selected' : ''}}  value="Malta">Malta</option>
                        <option {{old('country') === 'Marshall Islands' ? 'selected' : ''}}  value="Marshall Islands">Marshall Islands</option>
                        <option {{old('country') === 'Martinique' ? 'selected' : ''}}  value="Martinique">Martinique</option>
                        <option {{old('country') === 'Mauritania' ? 'selected' : ''}}  value="Mauritania">Mauritania</option>
                        <option {{old('country') === 'Mauritius' ? 'selected' : ''}}  value="Mauritius">Mauritius</option>
                        <option {{old('country') === 'Mayotte' ? 'selected' : ''}}  value="Mayotte">Mayotte</option>
                        <option {{old('country') === 'Mexico' ? 'selected' : ''}}  value="Mexico">Mexico</option>
                        <option {{old('country') === 'Midway Islands' ? 'selected' : ''}}  value="Midway Islands">Midway Islands</option>
                        <option {{old('country') === 'Moldova' ? 'selected' : ''}}  value="Moldova">Moldova</option>
                        <option {{old('country') === 'Monaco' ? 'selected' : ''}}  value="Monaco">Monaco</option>
                        <option {{old('country') === 'Mongolia' ? 'selected' : ''}}  value="Mongolia">Mongolia</option>
                        <option {{old('country') === 'Montserrat' ? 'selected' : ''}}  value="Montserrat">Montserrat</option>
                        <option {{old('country') === 'Morocco' ? 'selected' : ''}}  value="Morocco">Morocco</option>
                        <option {{old('country') === 'Mozambique' ? 'selected' : ''}}  value="Mozambique">Mozambique</option>
                        <option {{old('country') === 'Myanmar' ? 'selected' : ''}}  value="Myanmar">Myanmar</option>
                        <option {{old('country') === 'Nambia' ? 'selected' : ''}}  value="Nambia">Nambia</option>
                        <option {{old('country') === 'Nauru' ? 'selected' : ''}}  value="Nauru">Nauru</option>
                        <option {{old('country') === 'Nepal' ? 'selected' : ''}}  value="Nepal">Nepal</option>
                        <option {{old('country') === 'Netherland Antilles' ? 'selected' : ''}}  value="Netherland Antilles">Netherland Antilles</option>
                        <option {{old('country') === 'Netherlands' ? 'selected' : ''}}  value="Netherlands">Netherlands (Holland, Europe)</option>
                        <option {{old('country') === 'Nevis' ? 'selected' : ''}}  value="Nevis">Nevis</option>
                        <option {{old('country') === 'New Caledonia' ? 'selected' : ''}}  value="New Caledonia">New Caledonia</option>
                        <option {{old('country') === 'New Zealand' ? 'selected' : ''}}  value="New Zealand">New Zealand</option>
                        <option {{old('country') === 'Nicaragua' ? 'selected' : ''}}  value="Nicaragua">Nicaragua</option>
                        <option {{old('country') === 'Niger' ? 'selected' : ''}}  value="Niger">Niger</option>
                        <option {{old('country') === 'Nigeria' ? 'selected' : ''}}  value="Nigeria">Nigeria</option>
                        <option {{old('country') === 'Niue' ? 'selected' : ''}}  value="Niue">Niue</option>
                        <option {{old('country') === 'Norfolk Island' ? 'selected' : ''}}  value="Norfolk Island">Norfolk Island</option>
                        <option {{old('country') === 'Norway' ? 'selected' : ''}}  value="Norway">Norway</option>
                        <option {{old('country') === 'Oman' ? 'selected' : ''}}  value="Oman">Oman</option>
                        <option {{old('country') === 'Pakistan' ? 'selected' : ''}}  value="Pakistan">Pakistan</option>
                        <option {{old('country') === 'Palau Island' ? 'selected' : ''}}  value="Palau Island">Palau Island</option>
                        <option {{old('country') === 'Palestine' ? 'selected' : ''}}  value="Palestine">Palestine</option>
                        <option {{old('country') === 'Panama' ? 'selected' : ''}}  value="Panama">Panama</option>
                        <option {{old('country') === 'Papua New Guinea' ? 'selected' : ''}}  value="Papua New Guinea">Papua New Guinea</option>
                        <option {{old('country') === 'Paraguay' ? 'selected' : ''}}  value="Paraguay">Paraguay</option>
                        <option {{old('country') === 'Peru' ? 'selected' : ''}}  value="Peru">Peru</option>
                        <option {{old('country') === 'Phillipines' ? 'selected' : ''}}  value="Phillipines">Philippines</option>
                        <option {{old('country') === 'Pitcairn Island' ? 'selected' : ''}}  value="Pitcairn Island">Pitcairn Island</option>
                        <option {{old('country') === 'Poland' ? 'selected' : ''}}  value="Poland">Poland</option>
                        <option {{old('country') === 'Portugal' ? 'selected' : ''}}  value="Portugal">Portugal</option>
                        <option {{old('country') === 'Puerto Rico' ? 'selected' : ''}}  value="Puerto Rico">Puerto Rico</option>
                        <option {{old('country') === 'Qatar' ? 'selected' : ''}}  value="Qatar">Qatar</option>
                        <option {{old('country') === 'Republic of Montenegro' ? 'selected' : ''}}  value="Republic of Montenegro">Republic of Montenegro</option>
                        <option {{old('country') === 'Republic of Serbia' ? 'selected' : ''}}  value="Republic of Serbia">Republic of Serbia</option>
                        <option {{old('country') === 'Reunion' ? 'selected' : ''}}  value="Reunion">Reunion</option>
                        <option {{old('country') === 'Romania' ? 'selected' : ''}}  value="Romania">Romania</option>
                        <option {{old('country') === 'Russia' ? 'selected' : ''}}  value="Russia">Russia</option>
                        <option {{old('country') === 'Rwanda' ? 'selected' : ''}}  value="Rwanda">Rwanda</option>
                        <option {{old('country') === 'St Barthelemy' ? 'selected' : ''}}  value="St Barthelemy">St Barthelemy</option>
                        <option {{old('country') === 'St Eustatius' ? 'selected' : ''}}  value="St Eustatius">St Eustatius</option>
                        <option {{old('country') === 'St Helena' ? 'selected' : ''}}  value="St Helena">St Helena</option>
                        <option {{old('country') === 'St Kitts-Nevis' ? 'selected' : ''}}  value="St Kitts-Nevis">St Kitts-Nevis</option>
                        <option {{old('country') === 'St Lucia' ? 'selected' : ''}}  value="St Lucia">St Lucia</option>
                        <option {{old('country') === 'St Maarten' ? 'selected' : ''}}  value="St Maarten">St Maarten</option>
                        <option {{old('country') === 'St Pierre & Miquelon' ? 'selected' : ''}}  value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                        <option {{old('country') === 'St Vincent & Grenadines' ? 'selected' : ''}}  value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                        <option {{old('country') === 'Saipan' ? 'selected' : ''}}  value="Saipan">Saipan</option>
                        <option {{old('country') === 'Samoa' ? 'selected' : ''}}  value="Samoa">Samoa</option>
                        <option {{old('country') === 'Samoa American' ? 'selected' : ''}}  value="Samoa American">Samoa American</option>
                        <option {{old('country') === 'San Marino' ? 'selected' : ''}}  value="San Marino">San Marino</option>
                        <option {{old('country') === 'Sao Tome & Principe' ? 'selected' : ''}}  value="Sao Tome & Principe">Sao Tome & Principe</option>
                        <option {{old('country') === 'Saudi Arabia' ? 'selected' : ''}}  value="Saudi Arabia">Saudi Arabia</option>
                        <option {{old('country') === 'Senegal' ? 'selected' : ''}}  value="Senegal">Senegal</option>
                        <option {{old('country') === 'Seychelles' ? 'selected' : ''}}  value="Seychelles">Seychelles</option>
                        <option {{old('country') === 'Sierra Leone' ? 'selected' : ''}}  value="Sierra Leone">Sierra Leone</option>
                        <option {{old('country') === 'Singapore' ? 'selected' : ''}}  value="Singapore">Singapore</option>
                        <option {{old('country') === 'Slovakia' ? 'selected' : ''}}  value="Slovakia">Slovakia</option>
                        <option {{old('country') === 'Slovenia' ? 'selected' : ''}}  value="Slovenia">Slovenia</option>
                        <option {{old('country') === 'Solomon Islands' ? 'selected' : ''}}  value="Solomon Islands">Solomon Islands</option>
                        <option {{old('country') === 'Somalia' ? 'selected' : ''}}  value="Somalia">Somalia</option>
                        <option {{old('country') === 'South Africa' ? 'selected' : ''}}  value="South Africa">South Africa</option>
                        <option {{old('country') === 'Spain' ? 'selected' : ''}}  value="Spain">Spain</option>
                        <option {{old('country') === 'Sri Lanka' ? 'selected' : ''}}  value="Sri Lanka">Sri Lanka</option>
                        <option {{old('country') === 'Sudan' ? 'selected' : ''}}  value="Sudan">Sudan</option>
                        <option {{old('country') === 'Suriname' ? 'selected' : ''}}  value="Suriname">Suriname</option>
                        <option {{old('country') === 'Swaziland' ? 'selected' : ''}}  value="Swaziland">Swaziland</option>
                        <option {{old('country') === 'Sweden' ? 'selected' : ''}}  value="Sweden">Sweden</option>
                        <option {{old('country') === 'Switzerland' ? 'selected' : ''}}  value="Switzerland">Switzerland</option>
                        <option {{old('country') === 'Syria' ? 'selected' : ''}}  value="Syria">Syria</option>
                        <option {{old('country') === 'Tahiti' ? 'selected' : ''}}  value="Tahiti">Tahiti</option>
                        <option {{old('country') === 'Taiwan' ? 'selected' : ''}}  value="Taiwan">Taiwan</option>
                        <option {{old('country') === 'Tajikistan' ? 'selected' : ''}}  value="Tajikistan">Tajikistan</option>
                        <option {{old('country') === 'Tanzania' ? 'selected' : ''}}  value="Tanzania">Tanzania</option>
                        <option {{old('country') === 'Thailand' ? 'selected' : ''}}  value="Thailand">Thailand</option>
                        <option {{old('country') === 'Togo' ? 'selected' : ''}}  value="Togo">Togo</option>
                        <option {{old('country') === 'Tokelau' ? 'selected' : ''}}  value="Tokelau">Tokelau</option>
                        <option {{old('country') === 'Tonga' ? 'selected' : ''}}  value="Tonga">Tonga</option>
                        <option {{old('country') === 'Trinidad & Tobago' ? 'selected' : ''}}  value="Trinidad & Tobago">Trinidad & Tobago</option>
                        <option {{old('country') === 'Tunisia' ? 'selected' : ''}}  value="Tunisia">Tunisia</option>
                        <option {{old('country') === 'Turkey' ? 'selected' : ''}}  value="Turkey">Turkey</option>
                        <option {{old('country') === 'Turkmenistan' ? 'selected' : ''}}  value="Turkmenistan">Turkmenistan</option>
                        <option {{old('country') === 'Turks & Caicos Is' ? 'selected' : ''}}  value="Turks & Caicos Is">Turks & Caicos Is</option>
                        <option {{old('country') === 'Tuvalu' ? 'selected' : ''}}  value="Tuvalu">Tuvalu</option>
                        <option {{old('country') === 'Uganda' ? 'selected' : ''}}  value="Uganda">Uganda</option>
                        <option {{old('country') === 'United Kingdom' ? 'selected' : ''}}  value="United Kingdom">United Kingdom</option>
                        <option {{old('country') === 'Ukraine' ? 'selected' : ''}}  value="Ukraine">Ukraine</option>
                        <option {{old('country') === 'United Arab Erimates' ? 'selected' : ''}}  value="United Arab Erimates">United Arab Emirates</option>
                        <option {{old('country') === 'United States of America' ? 'selected' : ''}}  value="United States of America">United States of America</option>
                        <option {{old('country') === 'Uraguay' ? 'selected' : ''}}  value="Uraguay">Uruguay</option>
                        <option {{old('country') === 'Uzbekistan' ? 'selected' : ''}}  value="Uzbekistan">Uzbekistan</option>
                        <option {{old('country') === 'Vanuatu' ? 'selected' : ''}}  value="Vanuatu">Vanuatu</option>
                        <option {{old('country') === 'Vatican City State' ? 'selected' : ''}}  value="Vatican City State">Vatican City State</option>
                        <option {{old('country') === 'Venezuela' ? 'selected' : ''}}  value="Venezuela">Venezuela</option>
                        <option {{old('country') === 'Vietnam' ? 'selected' : ''}}  value="Vietnam">Vietnam</option>
                        <option {{old('country') === 'Virgin Islands (Brit)' ? 'selected' : ''}}  value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                        <option {{old('country') === 'Virgin Islands (USA)' ? 'selected' : ''}}  value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                        <option {{old('country') === 'Wake Island' ? 'selected' : ''}}  value="Wake Island">Wake Island</option>
                        <option {{old('country') === 'Wallis & Futana Is' ? 'selected' : ''}}  value="Wallis & Futana Is">Wallis & Futana Is</option>
                        <option {{old('country') === 'Yemen' ? 'selected' : ''}}  value="Yemen">Yemen</option>
                        <option {{old('country') === 'Zaire' ? 'selected' : ''}}  value="Zaire">Zaire</option>
                        <option {{old('country') === 'Zambia' ? 'selected' : ''}}  value="Zambia">Zambia</option>
                        <option {{old('country') === 'Zimbabwe' ? 'selected' : ''}}  value="Zimbabwe">Zimbabwe</option>
                    </select>
                    <label class="input-label label-require">Country</label>
                    <div class="error" @error('country') style="display: block;" @enderror>@error('country') {{$message}} @enderror</div>
                </div>
                <div class="input-fill-x">
                    <select name="device" class="input-fill select-control"  required>
                        <option {{old('country') === 'Curaco' ? 'selected' : ''}}  value="" disabled selected></option>
                        <option {{old('device') === 'iPhone' ? 'selected' : ''}}  value="iPhone">iPhone</option>
                        <option {{old('device') === 'Android' ? 'selected' : ''}}  value="Android">Android</option>
                        <option {{old('device') === 'Other' ? 'selected' : ''}}  value="Other">Other</option>
                    </select>
                    <label class="input-label label-require">Device</label>
                    <div class="error" @error('device') style="display: block;" @enderror>@error('device') {{$message}} @enderror</div>
                </div>
                <div class="form-txt">
                    By requesting access, you agree to our <a href="{{url('term-of-use')}}" target="_blank"> terms of use </a> and
                    <a href="{{url('privacy-notice')}}" target="_blank">privacy policy</a> , and you agree to your information being transferred to our email service provider for processing in accordance with their <a href="{{url('privacy-notice')}}" target="_blank">privacy policy</a> and
                    <a href="{{url('cookie-notice')}}" target="_blank">cookie policy</a> . You can unsubscribe at any time by clicking the “unsubscribe” link in any of these emails.
                </div>
                <div class="form-captcha">
                    {!! htmlFormSnippet() !!}
                    <div class="error" @error('g-recaptcha-response') style="display: block;" @enderror>@error('g-recaptcha-response') {{$message}} @enderror</div>
                </div>
                <div class="form-button">
                    <button class="button">
                        Request Beta Access
                    </button>
                </div>
            </form>
        </div>
    </section>

@endsection

@section('javascript')
    <{!! htmlScriptTagJsApi() !!}
    <script src="{{mix('js/app.js')}}"></script>
@endsection
