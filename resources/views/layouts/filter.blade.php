
                    <form action="{{ action([\App\Http\Controllers\PagesController::class, 'catalog']) }}" method="get">
                        @csrf
                        <div class="PublishHouse GroupName">
                            <div class="publish_house_menu">
                                Видавництво
                                <div class="number_of_publish_house">843</div>
                            </div>
                            <div class="Options">
                                <div class="Option">
                                    <input type="checkbox" id="option1" class="checkbox" name="PublishHouse[]"
                                           value="1DEA.me"
                                           onchange="this.form.submit()" <?php if (!empty($_GET['PublishHouse']) and in_array("1DEA.me", $_GET['PublishHouse'])) echo "checked"; ?>><label
                                        for="option1">1DEA.me</label>
                                </div>
                                <div class="Option">
                                    <input type="checkbox" id="option3" class="checkbox" name="PublishHouse[]"
                                           value="Cambridge University Press"
                                           onchange="this.form.submit()" <?php if (!empty($_GET['PublishHouse']) and in_array("Cambridge University Press", $_GET['PublishHouse'])) echo "checked"; ?>><label
                                        for="option3">Cambridge University Press</label>
                                </div>
                                <div class="Option">
                                    <input type="checkbox" id="option4" class="checkbox" name="PublishHouse[]"
                                           value="International"
                                           onchange="this.form.submit() " <?php if (!empty($_GET['PublishHouse']) and in_array("International", $_GET['PublishHouse'])) echo "checked"; ?>><label
                                        for="option4">International</label>
                                </div>
                                <div class="Option">
                                    <input type="checkbox" id="option5" class="checkbox" name="PublishHouse[]"
                                           value="Vivat"
                                           onchange="this.form.submit()" <?php if (!empty($_GET['PublishHouse']) and in_array("Vivat", $_GET['PublishHouse'])) echo "checked"; ?>><label
                                        for="option5">Vivat</label>
                                </div>
                                <div class="Option">
                                    <input type="checkbox" id="option6" class="checkbox" name="PublishHouse[]"
                                           value="А-ба-ба-га-ла-ма-га"
                                           onchange="this.form.submit()" <?php if (!empty($_GET['PublishHouse']) and in_array("А-ба-ба-га-ла-ма-га", $_GET['PublishHouse'])) echo "checked"; ?>><label
                                        for="option6">А-ба-ба-га-ла-ма-га</label>
                                </div>
                                <div class="Option">
                                    <input type="checkbox" id="option7" class="checkbox" name="PublishHouse[]"
                                           value="Видавництво Старого Лева"
                                           onchange="this.form.submit()" <?php if (!empty($_GET['PublishHouse']) and in_array("Видавництво Старого Лева", $_GET['PublishHouse'])) echo "checked"; ?>><label
                                        for="option7">Видавництво Старого Лева</label>
                                </div>
                                <div class="Option">
                                    <input type="checkbox" id="option8" class="checkbox" name="PublishHouse[]"
                                           value="Клуб Сімейного Дозвілля"
                                           onchange="this.form.submit()" <?php if (!empty($_GET['PublishHouse']) and in_array("Клуб Сімейного Дозвілля", $_GET['PublishHouse'])) echo "checked"; ?>><label
                                        for="option8">Клуб Сімейного Дозвілля</label>
                                </div>
                                <div class="Option">
                                    <input type="checkbox" id="option9" class="checkbox" name="PublishHouse[]"
                                           value="Наш Формат"
                                           onchange="this.form.submit()" <?php if (!empty($_GET['PublishHouse']) and in_array("Наш Формат", $_GET['PublishHouse'])) echo "checked"; ?>><label
                                        for="option9">Наш Формат</label>
                                </div>
                                <div class="Option">
                                    <input type="checkbox" id="option10" class="checkbox" name="PublishHouse[]"
                                           value="Ранок"
                                           onchange="this.form.submit()" <?php if (!empty($_GET['PublishHouse']) and in_array("Ранок", $_GET['PublishHouse'])) echo "checked"; ?>><label
                                        for="option10">Ранок</label>
                                </div>
                                <div class="Option">
                                    <input type="checkbox" id="option11" class="checkbox" name="PublishHouse[]"
                                           value="Фолио"
                                           onchange="this.form.submit()" <?php if (!empty($_GET['PublishHouse']) and in_array("Фолио", $_GET['PublishHouse'])) echo "checked"; ?>><label
                                        for="option11">Фолио</label>
                                </div>
                                <div class="Option">
                                    <input type="checkbox" id="option12" class="checkbox" name="PublishHouse[]"
                                           value="National Geographic"
                                           onchange="this.form.submit()" <?php if (!empty($_GET['PublishHouse']) and in_array("National Geographic<", $_GET['PublishHouse'])) echo "checked"; ?>><label
                                        for="option12">National Geographic</label>
                                </div>
                                <div class="Option">
                                    <input type="checkbox" id="option13" class="checkbox" name="PublishHouse[]"
                                           value="Orion"
                                           onchange="this.form.submit()" <?php if (!empty($_GET['PublishHouse']) and in_array("Orion", $_GET['PublishHouse'])) echo "checked"; ?>><label
                                        for="option13">Orion</label>
                                </div>
                            </div>
                        </div>
                        <div class="Price GroupName">
                            <div class="publish_house_menu">
                                Ціна
                            </div>
                            <?php
                            $lower_price = 0;
                            $upper_price = 0;

                            if (!empty($_GET['Price'])) {
                                $prices = array($_GET['Price']);
                            }

                            ?>
                            <div class="PriceControl">
                                <div class="PriceControl">
                                    <div class="Enter">
                                        <input aria-label="price-from" class="input-text from" id="price_input_from"
                                               name="Price[]" type="text" pattern="[0-9]*\.?[0-9]*"
                                               placeholder="Від" value="<?php if (isset($prices)){foreach ($prices as $price){
                                        echo $price[0];}}  ?>">
                                    </div>
                                    <div>
                                        <span class="control-label">-</span>
                                    </div>
                                    <div class="Enter">
                                        <input aria-label="price-to" class="input-text to" id="price_input_to"
                                               name="Price[]" type="text"
                                               pattern="[0-9]*\.?[0-9]*" placeholder="До" value="<?php if (isset($prices)){foreach ($prices as $price){
                                        echo $price[1];}}  ?>">
                                    </div>
                                    <div class="commit-button">
                                        <input type="submit" value="OK">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="Language GroupName">
                            <div class="publish_house_menu">
                                Мова
                                <div class="number_of_publish_house">10</div>
                            </div>
                            <div class="Options">
                                <div class="Option">
                                    <input  type="checkbox" id="lang-option1" class="checkbox"
                                            name="Language[]" onchange="this.form.submit()"
                                            value="Українська"
                                    <?php if (!empty($_GET['Language']) and in_array("Українська", $_GET['Language'])) echo "checked"; ?>><label
                                        for="lang-option1">Українська</label>
                                </div>
                                <div class="Option">
                                    <input type="checkbox" id="lang-option2" class="checkbox"
                                           name="Language[]" onchange="this.form.submit()"
                                           value="Англійська"
                                    <?php if (!empty($_GET['Language']) and in_array("Англійська", $_GET['Language'])) echo "checked"; ?>><label
                                        for="lang-option2">Англійська</label>
                                </div>
                                <div class="Option">
                                    <input type="checkbox" id="lang-option3" class="checkbox"
                                           name="Language[]" onchange="this.form.submit()"
                                           value="Німецька"
                                    <?php if (!empty($_GET['Language']) and in_array("Німецька", $_GET['Language'])) echo "checked"; ?>><label
                                        for="lang-option3">Німецька</label>
                                </div>
                                <div class="Option">
                                    <input type="checkbox" id="lang-option4" class="checkbox"
                                           name="Language[]" onchange="this.form.submit()"
                                           value="Російська"
                                    <?php if (!empty($_GET['Language']) and in_array("Російська", $_GET['Language'])) echo "checked"; ?>><label
                                        for="lang-option4">Російська</label>
                                </div>
                                <div class="Option">
                                    <input type="checkbox" id="lang-option5" class="checkbox"
                                           name="Language[]" onchange="this.form.submit()"
                                           value="Французька"
                                    <?php if (!empty($_GET['Language']) and in_array("Французька", $_GET['Language'])) echo "checked"; ?>><label
                                        for="lang-option5">Французька</label>
                                </div>
                                <div class="Option">
                                    <input type="checkbox" id="lang-option6" class="checkbox"
                                           name="Language[]" onchange="this.form.submit()"
                                           value="Італійська"
                                    <?php if (!empty($_GET['Language']) and in_array("Італійська", $_GET['Language'])) echo "checked"; ?>><label
                                        for="lang-option6">Італійська</label>
                                </div>
                                <div class="Option">
                                    <input type="checkbox" id="lang-option7" class="checkbox"
                                           name="Language[]" onchange="this.form.submit()"
                                           value="Іспанська"
                                    <?php if (!empty($_GET['Language']) and in_array("Іспанська", $_GET['Language'])) echo "checked"; ?>><label
                                        for="lang-option7">Іспанська</label>
                                </div>
                                <div class="Option">
                                    <input type="checkbox" id="lang-option8" class="checkbox"
                                           name="Language[]" onchange="this.form.submit()"
                                           value="Португальська"
                                    <?php if (!empty($_GET['Language']) and in_array("Португальська", $_GET['Language'])) echo "checked"; ?>><label
                                        for="lang-option8">Португальська</label>
                                </div>
                                <div class="Option">
                                    <input type="checkbox" id="lang-option9" class="checkbox"
                                           name="Language[]" onchange="this.form.submit()"
                                           value="Польська"
                                    <?php if (!empty($_GET['Language']) and in_array("Польська", $_GET['Language'])) echo "checked"; ?>><label
                                        for="lang-option9">Польська</label>
                                </div>
                                <div class="Option">
                                    <input type="checkbox" id="lang-option10" class="checkbox"
                                           name="Language[]" onchange="this.form.submit()"
                                           value="Чеська"
                                    <?php if (!empty($_GET['Language']) and in_array("Чеська", $_GET['Language'])) echo "checked"; ?>><label
                                        for="lang-option10">Чеська</label>
                                </div>
                            </div>
                        </div>
                        <div class="Author GroupName">
                            <div class="publish_house_menu">
                                Розділи
                                <div class="number_of_publish_house">10</div>
                            </div>
                            <div class="Options">
                                <div class="Option">
                                    <input type="checkbox" id="author-option1" class="checkbox"
                                           name="Section[]" onchange="this.form.submit()"
                                           value="Художня література"
                                    <?php if (!empty($_GET['Section']) and in_array("Художня література", $_GET['Section'])) echo "checked"; ?> ><label
                                        for="author-option1">Художня література</label>
                                </div>
                                <div class="Option">
                                    <input type="checkbox" id="author-option2" class="checkbox"
                                           name="Section[]" onchange="this.form.submit()"
                                           value="Словники та енциклопедії"
                                    <?php if (!empty($_GET['Section']) and in_array("Словники та енциклопедії", $_GET['Section'])) echo "checked"; ?> ><label
                                        for="author-option2">Словники та енциклопедії</label>
                                </div>
                                <div class="Option">
                                    <input type="checkbox" id="author-option3" class="checkbox"
                                           name="Section[]" onchange="this.form.submit()"
                                           value="Підручники"
                                    <?php if (!empty($_GET['Section']) and in_array("Підручники", $_GET['Section'])) echo "checked"; ?> ><label
                                        for="author-option3">Підручники</label>
                                </div>
                                <div class="Option">
                                    <input type="checkbox" id="author-option4" class="checkbox"
                                           name="Section[]" onchange="this.form.submit()"
                                           value="Наукова і технічна література"
                                    <?php if (!empty($_GET['Section']) and in_array("Наукова і технічна література", $_GET['Section'])) echo "checked"; ?> ><label
                                        for="author-option4">Наукова і технічна література</label>
                                </div>
                                <div class="Option">
                                    <input type="checkbox" id="author-option5" class="checkbox"
                                           name="Section[]" onchange="this.form.submit()"
                                           value="Дім та хобі"
                                    <?php if (!empty($_GET['Section']) and in_array("Дім та хобі", $_GET['Section'])) echo "checked"; ?> ><label
                                        for="author-option5">Дім та хобі</label>
                                </div>
                                <div class="Option">
                                    <input type="checkbox" id="author-option6" class="checkbox"
                                           name="Section[]" onchange="this.form.submit()"
                                           value="Подорожі та спорт"
                                    <?php if (!empty($_GET['Section']) and in_array("Подорожі та спорт", $_GET['Section'])) echo "checked"; ?>><label
                                        for="author-option6">Подорожі та спорт</label>
                                </div>
                                <div class="Option">
                                    <input type="checkbox" id="author-option7" class="checkbox"
                                           name="Section[]" onchange="this.form.submit()"
                                           value="Бізнес література"
                                    <?php if (!empty($_GET['Section']) and in_array("Бізнес література", $_GET['Section'])) echo "checked"; ?> ><label
                                        for="author-option7">Бізнес література</label>
                                </div>
                                <div class="Option">
                                    <input type="checkbox" id="author-option8" class="checkbox"
                                           name="Section[]" onchange="this.form.submit()"
                                           value="Релігія та езотерика"
                                    <?php if (!empty($_GET['Section']) and in_array("Релігія та езотерика", $_GET['Section'])) echo "checked"; ?> >
                                    <label for="author-option8">Релігія та езотерика</label>
                                </div>
                                <div class="Option">
                                    <input type="checkbox" id="author-option9" class="checkbox"
                                           name="Section[]" onchange="this.form.submit()"
                                           value="Книги для батьків"
                                    <?php if (!empty($_GET['Section']) and in_array("Книги для батьків", $_GET['Section'])) echo "checked"; ?> ><label
                                        for="author-option9">Книги для батьків</label>
                                </div>
                                <div class="Option">
                                    <input type="checkbox" id="author-option10" class="checkbox"
                                           name="Section[]" onchange="this.form.submit()"
                                           value="Комікси"
                                    <?php if (!empty($_GET['Section']) and in_array("Комікси", $_GET['Section'])) echo "checked"; ?> ><label
                                        for="author-option10">Комікси</label>
                                </div>
                            </div>
                        </div>
                    </form>
