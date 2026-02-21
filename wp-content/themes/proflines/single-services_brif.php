<?php
get_header();

$categories = get_the_category();
$service_type = !empty($categories) ? $categories[0]->slug : 'unknown';
$is_secondary = ($service_type === 'ina-sluzba');
?>

<main class="briff-page">
    <div class="breadcrump">
        <div class="container">
            <ul class="breadcrump__body">
                <li class="breadcrump__item">
                    <a href>Domov</a>
                </li>
                <li class="breadcrump__item">
                    <a href>Bal&#xED;ky slu&#x17E;ieb</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="briff">
        <div class="container">
            <div class="briff__body">
                <div class="briff__content">
                    <div class="briff-content__title">
                        <h1>Optimaliz&#xE1;cia pre vyh&#x13E;ad&#xE1;vanie v AI (AIO / GEO)</h1>
                    </div>
                    <div class="briff-content__subtitle">
                        <p>Slu&#x17E;ba novej gener&#xE1;cie, ktor&#xE1; pom&#xE1;ha zna&#x10D;k&#xE1;m zobrazova&#x165; sa v AI Overviews (Google) a vo v&#xFD;sledkoch vyh&#x13E;ad&#xE1;vania v ChatGPT.</p>
                    </div>
                    <div class="briff-content__text">
                        <p>Optimalizujeme obsah pre odpovede umelej inteligencie. Uprav&#xED;me va&#x161;e texty a d&#xE1;ta tak, aby v&#xE1;s ChatGPT, Gemini a nov&#xE9; Google vyh&#x13E;ad&#xE1;vanie odpor&#xFA;&#x10D;ali ako prv&#xFA; vo&#x13E;bu.<br><br>&#x160;trukt&#xFA;rujeme web tak, aby mu stroje rozumeli. Technicky prisp&#xF4;sob&#xED;me str&#xE1;nky, aby algoritmy vn&#xED;mali va&#x161;u firmu ako autoritu a citovali ju ako overen&#xFD; zdroj.<br><br>Zabezpe&#x10D;&#xED;me vidite&#x13E;nos&#x165; tam, kde be&#x17E;n&#xE9; SEO nesta&#x10D;&#xED;. Dostaneme va&#x161;u zna&#x10D;ku priamo do generovan&#xFD;ch odpoved&#xED; (AI Overviews), ktor&#xE9; pou&#x17E;&#xED;vatelia &#x10D;&#xED;taj&#xFA; bez nutnosti klikania na odkazy.<br><br>D&#xE1;me v&#xE1;m technologick&#xFD; n&#xE1;skok pred konkurenciou. K&#xFD;m ostatn&#xED; ladia len k&#x13E;&#xFA;&#x10D;ov&#xE9; slov&#xE1;, my priprav&#xED;me v&#xE1;&#x161; biznis na bud&#xFA;cnos&#x165; vyh&#x13E;ad&#xE1;vania sk&#xF4;r, ne&#x17E; sa stane &#x161;tandardom.<br><br>Vypl&#x148;te kr&#xE1;tky briefing a do 24 hod&#xED;n v&#xE1;m po&#x161;leme odpor&#xFA;&#x10D;anie + cenov&#xFA; ponuku na mieru.</p>
                    </div>
                </div>
                <div class="briff__form">
                    <form action>
                        <div class="form-head span-two">
                            <div class="form-head__title">
                                <h3>Kontaktn&#xE9; inform&#xE1;cie</h3>
                            </div>
                            <div class="form-head__text">
                                <p>Lorem ipsum dolor sitincididunt ut liquipgiat </p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>*Meno a priezvisko:</label>
                            <input type="text" name id placeholder="Meno a priezvisko" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>N&#xE1;zov spolo&#x10D;nosti (ak existuje):</label>
                            <input type="text" name id placeholder="N&#xE1;zov spolo&#x10D;nosti" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Telef&#xF3;n:</label>
                            <input type="text" name id placeholder="+421" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>*E-mail:</label>
                            <input type="text" name id placeholder="E-mail:" autocomplete="off">
                        </div>

                        <div class="form-badge span-two">
                            <p>ak nevid&#xED;te na&#x161;u odpove&#x10F; v doru&#x10D;enej po&#x161;te &#x2013; skontrolujte prie&#x10D;inok &#x201E;Spam&quot;. Pridajte si n&#xE1;s do &#x201E;Kontaktov&quot;, aby &#x10F;al&#x161;ie spr&#xE1;vy prich&#xE1;dzali priamo do doru&#x10D;enej po&#x161;ty.</p>
                        </div>

                        <div class="form-group radio span-two">
                            <h4>*Preferovan&#xFD; sp&#xF4;sob kontaktu:</h4>
                            
                            <div class="form-group__body">
                                <label>
                                    <input type="radio" name="contact-method" id="contact-method">
                                    <span></span>
                                    <p>Telef&#xF3;n</p>
                                </label>
                                <label>
                                    <input type="radio" name="contact-method" id="contact-method">
                                    <span></span>
                                    <p>E-mail</p>
                                </label>
                                <label>
                                    <input type="radio" name="contact-method" id="contact-method">
                                    <span></span>
                                    <p>WhatsApp</p>
                                </label>
                                <label>
                                    <input type="radio" name="contact-method" id="contact-method">
                                    <span></span>
                                    <p>Telegram</p>
                                </label>
                            </div>
                        </div>

                        <div class="form-content span-two">
                            <div class="form-content__title">
                                <h3>Detaily probl&#xE9;mu a &#xFA;&#x10D;tu</h3>
                            </div>
                            <div class="form-content__text">
                                <p>Tieto inform&#xE1;cie s&#xFA; potrebn&#xE9; na po&#x10D;iato&#x10D;n&#xFA; diagnostiku pr&#xED;&#x10D;iny blok&#xE1;cie a na pos&#xFA;denie rizika tzv. &#x201E;Death Loop&#x201C;.</p>
                            </div>
                        </div>

                        <div class="form-group span-two">
                            <h4>*Odkaz na v&#xE1;&#x161; web / e-shop:</h4>
                            <input type="text" name id placeholder="https://" autocomplete="off">
                            <span>(N&#xE1;m potrebujeme preveri&#x165; jeho technick&#xFD; stav a politiky)</span>
                        </div>

                        <div class="form-group span-two">
                            <h4>*Odkaz na v&#xE1;&#x161; web / e-shop:</h4>
                            <textarea name id placeholder="(Napr.: &#x201E;Misrepresentation&#x201C;, &#x201E;Circumventing Systems&#x201C;, &#x201E;Website needs improvement&#x201C; a pod.)" autocomplete="off"></textarea>
                        </div>

                        <div class="form-group radio span-two">
                            <h4>Potrebujete konzult&#xE1;ciu pred za&#x10D;iatkom?</h4>
                            
                            <div class="form-group__body">
                                <label>
                                    <input type="radio" name="need-consultation" id="need-consultation">
                                    <span></span>
                                    <p>&#xC1;no</p>
                                </label>
                                <label>
                                    <input type="radio" name="need-consultation" id="need-consultation">
                                    <span></span>
                                    <p>Nie</p>
                                </label>
                            </div>
                        </div>

                        <div class="form-group span-two">
                            <h4>Ko&#x13E;kokr&#xE1;t ste u&#x17E; podali odvolanie?</h4>
                            <input type="text" name id placeholder="0, 1, 2, 3+..." autocomplete="off">
                        </div>

                        <div class="form-group span-two">
                            <h4>Ako dlho je &#xFA;&#x10D;et GMC zablokovan&#xFD;?</h4>
                            <input type="text" name id placeholder="Napr. 2 t&#xFD;&#x17E;dne, 1 mesiac ..." autocomplete="off">
                        </div>

                        <div class="form-group span-two">
                            <h4>Pribli&#x17E;n&#xFD; rozpo&#x10D;et:</h4>
                            <input type="text" name id placeholder="Napr. 500-1000 EUR" autocomplete="off">
                        </div>

                        <div class="form-group span-two">
                            <h4>*Odkaz na v&#xE1;&#x161; web / e-shop:</h4>
                            <textarea name id placeholder="(Napr.: &#x201E;Misrepresentation&#x201C;, &#x201E;Circumventing Systems&#x201C;, &#x201E;Website needs improvement&#x201C; a pod.)" autocomplete="off"></textarea>
                        </div>

                        <div class="form-group checkbox span-two">
                            <h4>3) Ak&#xFD; hlavn&#xFD; cie&#x13E; chcete touto spolupr&#xE1;cou dosiahnu&#x165;?</h4>
                            
                            <div class="form-group__body">
                                <label>
                                    <input type="checkbox" name="goal" id="goal">
                                    <span></span>
                                    <p>Zv&#xFD;&#x161;i&#x165; predaj a z&#xED;ska&#x165; nov&#xFD;ch klientov (Lead Gen)</p>
                                </label>
                                <label>
                                    <input type="checkbox" name="goal" id="goal">
                                    <span></span>
                                    <p>Automatizova&#x165; procesy a u&#x161;etri&#x165; &#x10D;as (AI, Chatbot, CRM)</p>
                                </label>
                                <label>
                                    <input type="checkbox" name="goal" id="goal">
                                    <span></span>
                                    <p>Zlep&#x161;i&#x165; technick&#xFD; stav a funk&#x10D;nos&#x165; webu (Platby, R&#xFD;chlos&#x165;, UX)</p>
                                </label>
                                <label>
                                    <input type="checkbox" name="goal" id="goal">
                                    <span></span>
                                    <p>Predbehn&#xFA;&#x165; konkurenciu a budova&#x165; zna&#x10D;ku (SEO, PR, Market Intelligence)</p>
                                </label>
                                <label>
                                    <input type="checkbox" name="goal" id="goal">
                                    <span></span>
                                    <p>In&#xE9;:</p>
                                </label>
                                <label>
                            </label></div>

                            <h4>*Oblas&#x165; / produkt / slu&#x17E;ba:</h4>
                            <textarea name id placeholder="Napr .: e-commerce, IT slu&#x17E;by, gastron&#xF3;mia ..." autocomplete="off"></textarea>
                        </div>

                        <div class="form-group checkbox span-two">
                            <h4>*Hlavn&#xFD; cie&#x13E; marketingov&#xE9;ho prieskumu:</h4>
                            
                            <div class="form-group__body">
                                <label>
                                    <input type="checkbox" name="marketing-goal" id="marketing-goal">
                                    <span></span>
                                    <p>Overi&#x165; n&#xE1;pad pred spusten&#xED;m</p>
                                </label>
                                <label>
                                    <input type="checkbox" name="marketing-goal" id="marketing-goal">
                                    <span></span>
                                    <p>Lep&#x161;ie porozumie&#x165; svojmu z&#xE1;kazn&#xED;kovi</p>
                                </label>
                                <label>
                                    <input type="checkbox" name="marketing-goal" id="marketing-goal">
                                    <span></span>
                                    <p>Analyzova&#x165; konkurenciu</p>
                                </label>
                                <label>
                                    <input type="checkbox" name="marketing-goal" id="marketing-goal">
                                    <span></span>
                                    <p>N&#xE1;js&#x165; najvhodnej&#x161;iu niku alebo regi&#xF3;n</p>
                                </label>
                                <label>
                                    <input type="checkbox" name="marketing-goal" id="marketing-goal">
                                    <span></span>
                                    <p>Optimalizova&#x165; cenu alebo pozicionovanie</p>
                                </label>
                            </div>
                        </div>

                        <div class="form-group span-two">
                            <h4>Dopl&#x148;uj&#xFA;ce inform&#xE1;cie:</h4>
                            <textarea name id placeholder="&#x10C;oko&#x13E;vek &#x10F;al&#x161;ie, &#x10D;o by sme mali vedie&#x165;..." autocomplete="off"></textarea>
                        </div>

                        <div class="form-group checkbox span-two">
                            <h4>Spracovanie osobn&#xFD;ch &#xFA;dajov (GDPR)</h4>
                            
                            <div class="form-group__body">
                                <label>
                                    <input type="checkbox" name="gdpr" id="gdpr">
                                    <span></span>
                                    <p><span>*S&#xFA;hlas&#xED;m s podmienkami spracov&#xE1;vania osobn&#xFD;ch &#xFA;dajov pod&#x13E;a GDPR</span></p>
                                </label>
                                <label>
                                    <input type="checkbox" name="gdpr" id="gdpr">
                                    <span></span>
                                    <p>S&#xFA;hlas&#xED;m so zasielan&#xED;m u&#x17E;ito&#x10D;n&#xE9;ho obsahu (case &#x161;t&#xFA;die, tipy, e-booky), maxim&#xE1;lne 1&#xD7; t&#xFD;&#x17E;denne. M&#xF4;&#x17E;em sa kedyko&#x13E;vek odhl&#xE1;si&#x165;.S&#xFA;hlas&#xED;m so zasielan&#xED;m u&#x17E;ito&#x10D;n&#xE9;ho obsahu (case &#x161;t&#xFA;die, tipy, e-booky), maxim&#xE1;lne 1&#xD7; t&#xFD;&#x17E;denne. M&#xF4;&#x17E;em sa kedyko&#x13E;vek odhl&#xE1;si&#x165;.</p>
                                </label>
                            </div>
                        </div>

                        <div class="form-button button span-two">
                            <button type="submit">Odosla&#x165;</button>
                        </div>

                        <div class="form-caption span-two">
                            <span>P.S.: Ak e-mail nepri&#x161;iel, pozrite aj Spam</span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
get_footer();