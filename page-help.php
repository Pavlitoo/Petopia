<div class="help-page-content">
    <div class="help-intro fade-in">
        <p>Притулок "Petopia" існує завдяки підтримці небайдужих людей. Кожен може допомогти нашим підопічним знайти дім і отримати необхідний догляд. Ваша підтримка має величезне значення для сотень тварин, які щодня потребують допомоги.</p>
    </div>

    <div class="help-ways fade-in">
        <div class="help-way-item">
            <div class="help-way-icon">
                <i class="fas fa-hand-holding-heart"></i>
            </div>
            <div class="help-way-content">
                <h3><?php _e('Фінансова підтримка', 'petopia'); ?></h3>
                <p>Ваші пожертви допомагають нам забезпечувати тварин якісним харчуванням, необхідними ліками та ветеринарним обслуговуванням. Навіть невелика сума може врятувати життя.</p>

                <div class="donation-options">
                    <h4><?php _e('Способи пожертви:', 'petopia'); ?></h4>
                    <ul>
                        <li>Одноразова пожертва</li>
                        <li>Щомісячна підтримка</li>
                        <li>Корпоративне спонсорство</li>
                        <li>Цільова допомога конкретній тварині</li>
                    </ul>
                </div>

                <div class="donation-form">
                    <h4><?php _e('Зробити пожертву:', 'petopia'); ?></h4>
                    <!-- Форма для пожертв -->
                    <form class="donate-form">
                        <div class="donation-amount">
                            <div class="amount-option">
                                <input type="radio" name="amount" id="amount-100" value="100">
                                <label for="amount-100">100 грн</label>
                            </div>
                            <div class="amount-option">
                                <input type="radio" name="amount" id="amount-200" value="200">
                                <label for="amount-200">200 грн</label>
                            </div>
                            <div class="amount-option">
                                <input type="radio" name="amount" id="amount-500" value="500" checked>
                                <label for="amount-500">500 грн</label>
                            </div>
                            <div class="amount-option custom-amount">
                                <input type="radio" name="amount" id="amount-custom" value="custom">
                                <label for="amount-custom">
                                    <input type="text" placeholder="Інша сума">
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary"><?php _e('Пожертвувати', 'petopia'); ?></button>
                    </form>
                </div>
            </div>
        </div>

        <div class="help-way-item">
            <div class="help-way-icon">
                <i class="fas fa-user-friends"></i>
            </div>
            <div class="help-way-content">
                <h3><?php _e('Волонтерство', 'petopia'); ?></h3>
                <p>Ми завжди потребуємо додаткових рук та сердець для допомоги нашим підопічним. Ваш час і зусилля — безцінний внесок у наcпільну справу допомоги тваринам.</p>

                <div class="volunteer-options">
                    <h4><?php _e('Як ви можете допомогти:', 'petopia'); ?></h4>
                    <ul>
                        <li>Вигул собак</li>
                        <li>Спілкування з тваринами</li>
                        <li>Прибирання та догляд за приміщеннями</li>
                        <li>Допомога на заходах і акціях</li>
                        <li>Транспортування тварин</li>
                        <li>Фотографування тварин для сайту</li>
                        <li>Допомога з соціальними мережами</li>
                    </ul>
                </div>

                <a href="#volunteer-form" class="btn btn-secondary"><?php _e('Стати волонтером', 'petopia'); ?></a>
            </div>
        </div>

        <div class="help-way-item">
            <div class="help-way-icon">
                <i class="fas fa-paw"></i>
            </div>
            <div class="help-way-content">
                <h3><?php _e('Тимчасовий догляд', 'petopia'); ?></h3>
                <p>Деяким тваринам через вік, стан здоров'я або поведінкові особливості важко адаптуватися до життя в притулку. Тимчасовий дім дає їм шанс відновитися та підготуватися до постійної адопції.</p>

                <div class="foster-info">
                    <h4><?php _e('Що таке тимчасовий догляд?', 'petopia'); ?></h4>
                    <p>Тимчасовий догляд передбачає, що ви берете тварину до себе на певний період (від кількох тижнів до кількох місяців), поки вона не знайде постійний дім. Притулок забезпечує все необхідне: корм, ліки, аксесуари та ветеринарну допомогу.</p>
                </div>

                <a href="#foster-form" class="btn btn-secondary"><?php _e('Стати тимчасовим опікуном', 'petopia'); ?></a>
            </div>
        </div>

        <div class="help-way-item">
            <div class="help-way-icon">
                <i class="fas fa-shopping-basket"></i>
            </div>
            <div class="help-way-content">
                <h3><?php _e('Матеріальна допомога', 'petopia'); ?></h3>
                <p>Ми завжди потребуємо різноманітних товарів для забезпечення комфортного життя наших підопічних. Ви можете придбати необхідні речі самостійно або замовити їх доставку до притулку.</p>

                <div class="needs-list">
                    <h4><?php _e('Актуальні потреби:', 'petopia'); ?></h4>
                    <ul>
                        <li>Корм для собак і котів (сухий та вологий)</li>
                        <li>Ветеринарні препарати</li>
                        <li>Підстилки та ковдри</li>
                        <li>Миски для їжі та води</li>
                        <li>Повідки, нашийники та шлеї</li>
                        <li>Іграшки</li>
                        <li>Наповнювачі для котячих лотків</li>
                        <li>Засоби для прибирання</li>
                    </ul>
                </div>

                <p class="address-info">Ви можете привезти речі особисто за адресою притулку або замовити їх доставку.</p>
            </div>
        </div>
    </div>

    <div id="volunteer-form" class="application-form volunteer-form fade-in">
        <h3><?php _e('Форма для волонтерів', 'petopia'); ?></h3>
        <!-- Форма для волонтерів -->
    </div>

    <div id="foster-form" class="application-form foster-form fade-in">
        <h3><?php _e('Форма для тимчасових опікунів', 'petopia'); ?></h3>
        <!-- Форма для тимчасових опікунів -->
    </div>
</div>