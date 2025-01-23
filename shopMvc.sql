-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 23 2025 г., 20:12
-- Версия сервера: 8.0.30
-- Версия PHP: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shopMvc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `buyers`
--

CREATE TABLE `buyers` (
  `id` int NOT NULL,
  `login` varchar(30) NOT NULL,
  `pib` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `number` varchar(20) NOT NULL,
  `email` varchar(90) NOT NULL,
  `adres` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `buyers`
--

INSERT INTO `buyers` (`id`, `login`, `pib`, `password`, `number`, `email`, `adres`) VALUES
(1, 'Nazar', 'Снітка Назар Валентинович', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '3806291446', 'nazarsnitka813@gmail.com', ' asdfasdas'),
(2, 'Nazar813', 'Лизогуб Ростислва Віталійович', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '885', 'fjejdf@gmail.com', ' edwewewewe'),
(3, 'bogdan', 'Ситніков Богдан Віталійович', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '0662606736', 'bogdan123@gmail.com', ' sdsdsdsdsds'),
(4, 'Staff813', 'Рядненко Станіслав Володимирович', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '0937434', 'stas123@gmail.com', ' dwdwdsxwdfsd'),
(5, 'anton', 'Танащук Антон Сергійович', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '343455463', 'anton228@gmail.com', ' wewewewewewewe');

-- --------------------------------------------------------

--
-- Структура таблицы `coupon`
--

CREATE TABLE `coupon` (
  `id` int NOT NULL,
  `code` varchar(19) NOT NULL,
  `discountValue` varchar(2) NOT NULL,
  `dateStart` date NOT NULL,
  `dateEnd` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `coupon`
--

INSERT INTO `coupon` (`id`, `code`, `discountValue`, `dateStart`, `dateEnd`) VALUES
(1, '9472-8519-1774-1750', '15', '2024-09-15', '2024-09-27'),
(2, '6053-9817-4741-6622', '25', '2024-09-15', '2024-09-20'),
(3, '9541-0640-8904-8096', '22', '2024-09-15', '2024-09-16'),
(4, '5753-9080-2785-3225', '12', '2024-09-16', '2024-09-17'),
(5, '6893-2602-8009-2417', '99', '2024-10-03', '2024-10-06');

-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

CREATE TABLE `page` (
  `id` int NOT NULL,
  `metaTitle` varchar(50) NOT NULL,
  `metaDiscription` varchar(50) NOT NULL,
  `metaKeywords` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `fullContent` text NOT NULL,
  `page` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `prior` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `page`
--

INSERT INTO `page` (`id`, `metaTitle`, `metaDiscription`, `metaKeywords`, `title`, `fullContent`, `page`, `name`, `prior`) VALUES
(1, 'Головна', 'Головна сторінка сайту', 'Головна сторінка сайту', 'Головна', 'Поки що тут нічого немає(', 'index', 'Головна', 1),
(2, 'Про нас', 'Про нас', 'Про нас', 'Про нас', 'Ласкаво просимо до нашого інтернет-магазину велосипедів!\n\nМи раді представити вам широкий асортимент велосипедів для будь-яких потреб і вподобань. Наш магазин створений з любов\'ю до велосипедів і прагненням забезпечити наших клієнтів тільки найкращими продуктами. Ось чому ми ретельно підбираємо кожну модель і пропонуємо тільки найякісніші та надійні велосипеди від провідних виробників.\n\nХто ми?\nМи — команда велосипедних ентузіастів з багаторічним досвідом у велоспорті та продажу велосипедів. Наша мета — зробити ваш досвід вибору та купівлі велосипеда максимально зручним і приємним. Ми завжди готові допомогти вам обрати велосипед, який ідеально підходить саме вам, враховуючи ваші індивідуальні потреби та вподобання.', 'about', 'Про нас', 3),
(3, 'Контакти', 'Контакти', 'Контакти', 'Контакти', 'Номер менеджера: +380-050-629-14-46\r\nАдреса електронної пошти: bootshop@gmail.com', 'contacts', 'Контакти', 4),
(4, 'Вакансії', 'Вакансії', 'Вакансії', 'Вакансії', 'Шукаємо працівників до нашого інтернет магазину! Наші контакти в розділі контакти!', 'vacanci', 'Вакансії', 5),
(5, 'Каталог товарів', 'Каталог товарів', 'Каталог товарів', '', '', 'catalog', 'Каталог', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `relationOrder`
--

CREATE TABLE `relationOrder` (
  `id` int NOT NULL,
  `idKlient` int NOT NULL,
  `idTovar` int NOT NULL,
  `kolvo` int NOT NULL,
  `dataOrder` date NOT NULL,
  `koment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `idCoupon` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `relationOrder`
--

INSERT INTO `relationOrder` (`id`, `idKlient`, `idTovar`, `kolvo`, `dataOrder`, `koment`, `idCoupon`, `status`) VALUES
(1, 1, 78, 1, '2024-09-08', ' ', 0, 0),
(2, 1, 79, 1, '2024-09-08', ' ', 0, 0),
(3, 1, 77, 1, '2024-09-08', ' ', 0, 0),
(5, 2, 34, 1, '2024-09-12', '', 0, 1),
(6, 2, 35, 1, '2024-09-12', '', 0, 1),
(7, 1, 35, 1, '2024-09-12', 'бистро', 0, 1),
(8, 2, 84, 1, '2024-09-12', 'fefefe', 0, 1),
(9, 1, 35, 1, '2024-09-16', '', 1, 1),
(10, 1, 35, 1, '2024-09-19', '', 2, 0),
(11, 1, 79, 2, '2024-09-22', '', 0, 0),
(12, 1, 35, 1, '2024-09-22', '', 0, 0),
(13, 3, 83, 1, '2024-10-03', ' efefefefefe', 0, 1),
(14, 3, 81, 1, '2024-10-03', ' efefefefefe', 0, 1),
(15, 3, 82, 1, '2024-10-03', ' efefefefefe', 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `tovar`
--

CREATE TABLE `tovar` (
  `id` int NOT NULL,
  `idType` int NOT NULL,
  `color` varchar(30) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `har` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tovarKilk` int NOT NULL,
  `dateRelease` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tovar`
--

INSERT INTO `tovar` (`id`, `idType`, `color`, `name`, `price`, `har`, `tovarKilk`, `dateRelease`) VALUES
(34, 2, 'Сірий', 'KTM CHICAGO 291', '32000.00', 'Матеріал рами\r\nАлюміній\r\nТип гальм\r\nДискові гідравлічні\r\nКількість швидкостей\r\n9\r\nРама\r\nАлюминий серии 6061, MTB M1110\r\nКермова колонка\r\nRitchey Zero Logic Пресс-фит 1-1/8&quot;\r\nВилка\r\nSuntour SF19-XCT30\r\nГидравлическая блокировка\r\nПод дисковый тормоз\r\nСистема шатунів\r\nShimano MT101-2\r\nПередній перемикач швидкостей\r\nShimano Altus M2000-SGS с технологией Shadow\r\nЗадній перемикач швидкостей\r\nShimano MT200\r\nРучки перемикання (манетки)\r\nShimano Altus M2010\r\nКасета\r\nShimano Alivio HG200-9 диапазноном от 11 до 34 зубцов\r\nЛанцюг\r\nKMC Z9\r\nГальма\r\nTektro HD-T275\r\nГальмівні ручки\r\nЭргономичные, Алюминиевые Tektro\r\nКількість в упаковці, шт\r\n1\r\nОбоди\r\nKTM 28&quot; Sport на 32 спицы\r\nВтулки\r\nПередняя: Shimano Tourney HB-TX505 на 32 спицы, QR ось длиной 100 мм\r\nЗадняя: Shimano Tourney FH-TX505-8 на 32 спицы, QR ось длиной 135 мм\r\nПокришки\r\nSchwalbe Smart Sam, Технология защиты: K-guard, Размер ETRTO: 57-622 мм\r\nКермо\r\nKTM Line, Подъем 12°, Ширина от 720 до 740 мм в зависимости от ростовки\r\nРучки керма\r\nKTM Comp MTB\r\nВиніс керма\r\nKTM Comp, Подъем 7°\r\nПідсідельний штир\r\nKTM Comp\r\nСідло\r\nKTM Line Sport\r\nПедалі\r\nKTM Comp MTB BF\r\nРік випуску\r\n2022\r\nВага, кг\r\n15.1\r\nКраїна реєстрації бренду\r\nАвстрія\r\nГарантія\r\n5 років на раму, 6 місяців на обладнання\r\nКраїна-виробник товару\r\nАвстрія', 7, '2024-04-03'),
(35, 4, 'Чорний', 'VNC TimeRacer Team', '37604.00', 'Матеріал рами\r\nКарбон\r\nТип гальм\r\nДискові механічні\r\nКількість швидкостей\r\n24\r\nРама\r\nVNC Road ExtraLite, карбонова\r\nКаретка\r\nPressed B. B.\r\nКермова колонка\r\nVNC M2, A-Headset, semi-integrated\r\nВилка\r\nV-Class Alpha Race, карбонова\r\nСистема шатунів\r\nV-Class Sigma, 36T/52T, алюмінієві\r\nПередній перемикач швидкостей\r\nSensah Empire Pro FD-R12-Z2, index, 2 speed\r\nЗадній перемикач швидкостей\r\nSensah Empire Pro RD-R12-GS-C, index, 12 speed\r\nРучки перемикання (манетки)\r\nSensah Empire Pro ST-R12, dual control, 2x12 speed\r\nКасета\r\nSensah CS-HR12, cassette type, index, 11-34T\r\nЛанцюг\r\nKMC X12\r\nГальма\r\nLogan, дискові механічні, ротор 160мм\r\nГальмівні ручки\r\nSensah Empire Pro ST-R12, алюміній\r\nКількість в упаковці, шт\r\n1\r\nОбоди\r\nV-Class Sigma 28&quot;, disc, double wall (двостінні), алюмінієві\r\nВтулки\r\nПередня: V-Class Alpha, disk, thru-axle, алюмінієва; Задня: V-Class Alpha, disk, thru-axle, алюмінієва\r\nПокришки\r\nCompass Fire Bolt, 60 TPI, 700C x 28C\r\nКермо\r\nV-Class Sigma Race, алюмінієвий\r\nРучки керма\r\nV-Class Race, гумові\r\nВиніс керма\r\nV-Class Sigma, алюмінієвий\r\nПідсідельний штир\r\nV-Class Alpha, карбоновий\r\nСідло\r\nV-Class RoadRace\r\nПедалі\r\nV-Class FP-803, ball bearings, пластикові\r\nКомплектація\r\nВелосипед\r\nРік випуску\r\n2023\r\nВага, кг\r\n9.4\r\nКраїна реєстрації бренду\r\nВелика Британія\r\nГарантія\r\n12 місяців\r\nКраїна-виробник товару\r\nКитай', 5, '2024-04-02'),
(36, 2, 'test228', 'Test228', '228228.00', 'dsdsd228', 12227, '2024-04-28'),
(77, 1, 'Зелений', 'Велосипед KINK BMX GAP XL 2022', '25055.00', 'Gap XL — це просто дуже велика 21-дюймова версія перевіреного та справжнього Kink Gap з верхньою трубою. Завдяки сучасній геометрії рама, вилка та кермо також додають у суміш трохи хромомолібдену 4130 і доступні у двох чудових колірних рішеннях: Gloss Woodsmen Green та Matte Spotlight Purple. Компоненти Gap XL виходять на новий рівень, і їх не можна упустити. Мало того, що він виглядатиме відповідно, вищі 9,25-дюймові керма Kink T925, вилки Kink Stryker, винос Kink Bold HRD, герметична втулка касети Mission Engage та трикомпон хромомолібденові шатуни Kink Ridge допомагають йому відчувати та виконувати роль. Також не слід забувати про додавання сидіння Stealth і підсідельного штиря, які додають регульованість та сумісність із сучасними технологіями. Сучасна геометрія рами забезпечує нижчу каретку та збільшену висоту стійки Gap XL для стабільної їзди.', 4, '2024-06-05'),
(78, 2, 'Чорно-зелений', 'Велосипед Ardis Buggy 26&quot; 17&quot;', '7999.00', 'Розмір рами\r\n17&quot;\r\nДіаметр коліс\r\n26&quot;\r\nКлас\r\nГірський\r\nКолір\r\nЧорно-зелений\r\nМатеріал рами\r\nСталь\r\nТип гальм\r\nДискові механічні\r\nКількість швидкостей\r\n21\r\nРама\r\nСталь\r\nКаретка\r\nNeco\r\nКермова колонка\r\nNeco\r\nВилка\r\nArdis\r\nЗадній амортизатор\r\nЄ\r\nСистема шатунів\r\nST\r\nПередній перемикач швидкостей\r\nShimano\r\nЗадній перемикач швидкостей\r\nShimano\r\nРучки перемикання (манетки)\r\nShimano\r\nКасета\r\nShimano\r\nЛанцюг\r\nKMC\r\nГальма\r\nDisk Brake, Ares\r\nОбоди\r\nАлюміній\r\nВтулки\r\nСталь\r\nПокришки\r\n26&quot;\r\nКермо\r\nСталь\r\nРучки керма\r\nЄ\r\nВиніс керма\r\nСталь\r\nПідсідельний штир\r\nСталь\r\nСідло\r\nArdis\r\nПедалі\r\nПластик\r\nКомплектація\r\nВелосипед, відбивачі\r\nРік випуску\r\n2023\r\nВага, кг\r\n16\r\nГарантійні умови\r\nДокладніше \r\nГабарити упаковки\r\n120 х 50 х 20 см\r\nКраїна реєстрації бренду\r\nУкраїна\r\nГарантія\r\n12 місяців\r\nКраїна-виробник товару\r\nУкраїна', 5, '2024-07-11'),
(79, 2, 'Синій', 'Велосипед TORPADO Matador XX1AX M17', '302400.00', 'MATADOR XX1AX - это 29- дюймовый МТБ с полной подвеской, рама которого сделана из углеродного волокна по технологии MONOCOQUE UD . Благодаря спортивной геометрии и ходу амортизатора FOX (100 мм) велосипед идеально подходит для кросс-кантри. расы. МАТАДОР XX1AX оснащен FLOAT FOX DPS шок . A 165/38 REMOTE.\r\n\r\n\r\n\r\nАМОРТИЗАЦИЯ\r\n\r\nСистема Boost делает MATADOR XX1AX еще более стабильным и точным. Система подвески специально разработана, чтобы избежать «раскачивания» при нажатии на педали и проявления прогрессивной тенденции во время вождения.\r\n\r\n\r\n\r\nПРОЧНЫЕ И БОЛЬШИЕ КОЛЕСА\r\n\r\nАлюминиевые диски DRC обеспечивают высокую жесткость. Именно поэтому байк хорошо работает на сложных трассах скоростного спуска . Вам не придется беспокоиться о деформации обода и дорогостоящем посещении сервисного центра. Большой размер колес облегчает преодоление препятствий.\r\n\r\n\r\n\r\nФАВОРИТ ЧЕМПИОНОВ\r\n\r\nВсе это дополнено эффектной визуальной стороной мотоцикла и его окраской, что не позволяет пройти равнодушно. Модели MATADOR особенно рекомендуются Герхардом Кершбаумером , призером чемпионатов мира и Европы, который, представляя цвета TORAPDO , ездит на байке марки.\r\n\r\n\r\n\r\nТОРМОЗА\r\n\r\nВ случае с велосипедом необходимы эффективные тормоза, которые быстро реагируют и обеспечивают равномерное торможение. Это задача из Формулы R1R дисковые тормоза . Они отлично справляются с поставленной задачей даже в сложных погодных условиях, значительно ухудшающих состояние поверхности.\r\n\r\n\r\n\r\nСЕДЛО\r\n\r\nMATADOR XX1AX оснащен всеми удобствами, соответствующими стандартам последнего поколения, такими как интеграция линий и возможность использования телескопического подседельного штыря.', 2, '2024-07-04'),
(80, 3, 'Purple Satin', 'Шосейний велосипед Vento BORA 28', '25999.00', 'Характеристики:\r\nТип велосипеда: Шосейний\r\n\r\nСтать Чоловіча Жіноча\r\n\r\nСідло: Vento ROAD\r\n\r\nГальма: Tektro C510R/C510F 160mm rotor\r\n\r\nЗадній перемикач: SHIMANO CLARIS RD-R2000 \r\n\r\nМанетки: SHIMANO CLARIS ST-R2000\r\n\r\nПередній перемикач: SHIMANO CLARIS FD-R2000 \r\n\r\nКолеса: Втулки - DH505.ALLOY / Ободі - Vento Double Wall 700C \r\n\r\nВинос: Vento ALLOY. 400MM\r\n\r\nРама: 700C&quot; ALLOY 6061 ROAD FRAME \r\n\r\nКермо: Vento ROAD TYPE ALLOY. 90MM\r\n\r\nМатеріал втулки: Алюміній \r\n\r\nДіаметр коліс: 28 \r\n\r\nВиделка: AL6061 700C ROAD FORK \r\n\r\nОбод: Подвійний алюмінієвий \r\n\r\nКасета: SUGEK CS-R5008.CASSEETE.8 SP.11-25T\r\n\r\nМатеріал рами: Алюміній \r\n\r\nМатеріал педалей: Алюміній \r\n\r\nРік: 2022', 3, '2024-07-04'),
(81, 3, 'сріблястий/червоний', 'Велосипед Author Integra', '22418.00', 'Author Integra - жіночий міський велосипед гібрид, що поєднав у собі якості міського та гірського велосипедів, створений для швидкої їзди по міському асфальту або втоптаним стежкам, при цьому зберігаючи більш вертикальну посадку.\r\n\r\n    Рама виконана з легкого алюмінієвого сплаву 6061 із скошеною верхньою трубою, з використанням технологій баттингу та гідроформінгу. Як характерні елементи MTB, Integra обладнаний амортизаційною вилкою та багатошвидкісною трансмісією. При цьому широке підняте кермо, комфортне сідло та оптимально підібрана довжина виносу забезпечують комфортну та безпечну їзду з передбачуваним керуванням. На рамі передбачено кріплення для додаткових аксесуарів. Колір байка - сріблястий з елементами червоного, вага - 13.5 кг. Розмір рами M (17&quot;) підійде для райдера зростом 160 - 175 см. Середній рівень комплектації трансмісії розрахований на активну експлуатацію велосипеда. Ободні гальма забезпечать надійне гальмування у сонячні дні, проте гірше за дискові відпрацьовують коли на ободах коліс мокрий бруд.\r\n\r\n    На велосипеді встановлена ​​трансмісія на 27 швидкості на базі обладнання Shimano. Амортизацію забезпечує пружинно-еластомерна вилка RST Neon ML з локаутом та ходом 60 мм. За гальмування відповідають ободні гальма Tektro. Колеса зібрані на фірмовому подвійному алюмінієвому ободі Author Argon 29, втулках Quando 32H і взуті в покришки 700x38C Author Cross для їзди по асфальту. Велосипед розрахований на вагу велосипедиста до 115 кг.', 7, '2024-07-05'),
(82, 2, 'Синій', 'Велосипед Titan Cobra 26&quot;', '11499.00', 'Розмір рами\r\n17&quot;\r\nДіаметр коліс\r\n26&quot;\r\nКлас\r\nГірський\r\nХардтейл\r\nКолір\r\nСиній\r\nМатеріал рами\r\nАлюміній\r\nТип гальм\r\nДискові механічні\r\nКількість швидкостей\r\n27\r\nРама\r\nАлюміній, Хардтейл\r\nКаретка\r\nКартридж SHIMANO, BB-UN100\r\nКермова колонка\r\nРульова колонка NECO H117DM, 1-1/8&quot; х 44 х 30\r\nВилка\r\n26&quot; Алюмінієва вилка UDING з виносним LockOut, безрізьбова, хід: 60 мм\r\nСистема шатунів\r\nАлюмінієвий шатун SHIMANO, AFCMT101, 1/2 х 3/32 х 22 х 30 х 40T х 170 мм\r\nПередній перемикач швидкостей\r\nSHIMANO, AFSTY500TSM6\r\nЗадній перемикач швидкостей\r\nSHIMANO, ARDM2000SGS\r\nРучки перемикання (манетки)\r\nSHIMANO, ASLM2000 27SPD\r\nКасета\r\nSHIMANO, ACSHG2019134\r\nЛанцюг\r\nKMC, C9R 112L\r\nГальма\r\nМеханічний дисковий ZOOM\r\nГальмівні ручки\r\nАлюмінієва ручка POWER, VL320DG\r\nОбоди\r\nПодвійний алюмінієвий обід\r\nВтулки\r\nПередня втулка ShunFeng: SF-B27, алюміній із ексцентриком\r\nЗадня втулка ShunFeng: SF-B27, алюміній із ексцентриком\r\nПокришки\r\nK1153, 26 х 2.35, D: 650 мм, W: 53 мм\r\nКермо\r\nTITAN Алюмінієвий, довжина: 680 мм\r\nРучки керма\r\nГумові, 125 мм\r\nВиніс керма\r\nTITAN Алюмінієвий винос, довжина: 90 мм\r\nПідсідельний штир\r\nTITAN Алюмінієвий підсідельний палець\r\nСідло\r\nMTB type\r\nПедалі\r\nАлюмінієві педалі\r\nКомплектація\r\nВелосипед, паспорт, ключі для збирання\r\nРік випуску\r\n2022\r\nВага, кг\r\n14\r\nКраїна реєстрації бренду\r\nУкраїна\r\nГарантія\r\n6 місяців\r\nКраїна-виробник товару\r\nУкраїна', 7, '2024-07-31'),
(83, 2, 'Сірий', 'Велосипед Ardis Manhattan МТВ AL', '13268.00', 'Розмір рами\r\n17&quot;\r\nДіаметр коліс\r\n29&quot;\r\nКлас\r\nГірський\r\nКолір\r\nСірий\r\nМатеріал рами\r\nАлюміній\r\nТип гальм\r\nДискові механічні\r\nКількість швидкостей\r\n21\r\nРама\r\n17\r\nВилка\r\nSuntour XCE, 1-1/8”, Coil, QR Type, 100 мм\r\nСистема шатунів\r\nProwheel MA-C49\r\nПередній перемикач швидкостей\r\nShimano Tourney TY-300\r\nЗадній перемикач швидкостей\r\nShimano Tourney TX-300\r\nРучки перемикання (манетки)\r\nShimano Tourney STEF 41 3+7\r\nКасета\r\nShimano Tourney\r\nЛанцюг\r\nKMC 7 speed\r\nГальма\r\nShimano BR-TX805 mechanic shimano\r\nКількість в упаковці, шт\r\n1\r\nОбоди\r\nAluminium 36H (Проти ударні)\r\nПокришки\r\nCompass Billy Goat 26x2.10\r\nКомплектація\r\nІнструкція, катафоти\r\nРік випуску\r\n2024\r\nВага, кг\r\n15\r\nКраїна реєстрації бренду\r\nУкраїна\r\nГарантія\r\n12 місяців\r\nКраїна-виробник товару\r\nУкраїна', 10, '2024-08-01'),
(84, 2, 'Чорний', 'Велосипед KTM CHICAGO 272', '27300.00', 'Серія\r\nCHICAGO\r\nРозмір рами\r\nM\r\nДіаметр коліс\r\n27.5&quot;\r\nКлас\r\nГірський\r\nХардтейл\r\nКолір\r\nЧорний\r\nМатеріал рами\r\nАлюміній\r\nТип гальм\r\nДискові гідравлічні\r\nКількість швидкостей\r\n8\r\nРама\r\nАлюминий серии 6061, MTB M1110\r\nКермова колонка\r\nRitchey Zero Logic Пресс-фит 1-1/8&quot;\r\nВилка\r\nSuntour SF19-XCE28, Под дисковый тормоз 80/100 мм\r\nСистема шатунів\r\nShimano Tourney TY301-3\r\nПередній перемикач швидкостей\r\nShimano Acera EF505\r\nЗадній перемикач швидкостей\r\nShimano MT200\r\nРучки перемикання (манетки)\r\nМоноблоки\r\nКасета\r\nShimano Tourney HG200-8 диапазноном от 12 до 32 зубцов\r\nЛанцюг\r\nKMC Z8.3\r\nГальма\r\nПередний: Shimano Acera EF505\r\nЗадний: Shimano MT201\r\nГальмівні ручки\r\nЭргономичные, Алюминиевые\r\nКількість в упаковці, шт\r\n1\r\nОбоди\r\nKTM 27.5&quot; Sport на 32 спицы\r\nВтулки\r\nПередняя: Shimano Tourney HB-TX505 на 32 спицы, QR ось длиной 100 мм\r\nЗадняя: Shimano Tourney FH-TX505-8 на 32 спицы, QR ось длиной 135 мм\r\nПокришки\r\nSmartpac Twinskin, Размер ETRTO: 54-584 мм\r\nКермо\r\nKTM Line, Подъем 12°, Ширина от 680 до 720 мм в зависимости от ростовки\r\nРучки керма\r\nKTM Comp MTB\r\nВиніс керма\r\nKTM Comp, Подъем 7°\r\nПідсідельний штир\r\nKTM Comp\r\nСідло\r\nKTM Line Sport\r\nПедалі\r\nKTM Comp MTB BF\r\nРік випуску\r\n2023\r\nВага, кг\r\n15\r\nКраїна реєстрації бренду\r\nАвстрія\r\nГарантія\r\n5 років на раму, 6 місяців на обладнання\r\nКраїна-виробник товару\r\nАвстрія', 6, '2024-08-01');

-- --------------------------------------------------------

--
-- Структура таблицы `tovarPhoto`
--

CREATE TABLE `tovarPhoto` (
  `id` int NOT NULL,
  `idTovar` int NOT NULL,
  `fileName` varchar(255) NOT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tovarPhoto`
--

INSERT INTO `tovarPhoto` (`id`, `idTovar`, `fileName`, `status`) VALUES
(60, 34, '1714463760430050872.webp', 1),
(61, 34, '1714463760430050876.webp', 0),
(62, 34, '1714463760430050877.webp', 0),
(63, 34, '1714463760430050879.webp', 0),
(64, 34, '1714463760430050882.webp', 0),
(65, 35, '1714464052430634857.webp', 1),
(66, 35, '1714464052430634858.webp', 0),
(67, 35, '1714464052430634859.webp', 0),
(70, 36, 'noPhoto.jpg', 1),
(87, 77, '1721558879413851953.webp', 0),
(88, 77, '1721558879413851956.webp', 1),
(89, 77, '1721558879413851959.webp', 0),
(90, 77, '1721558879413851961.webp', 0),
(91, 77, '1721558879413851964.webp', 0),
(100, 36, '1721720224430634858.webp', 0),
(101, 36, '1721720224430634859.webp', 0),
(102, 78, '1722328648430554684.webp', 1),
(103, 79, '1722328803183605744.webp', 1),
(104, 79, '1722328803183605758.webp', 0),
(105, 79, '1722328803183605770.webp', 0),
(106, 80, '1722329029330354646.webp', 1),
(107, 80, '1722329029330354656.webp', 0),
(108, 80, '1722329029330354677.webp', 0),
(109, 80, '1722329029330354702.webp', 0),
(110, 80, '1722329029330354717.webp', 0),
(111, 81, '1722329404374060952.webp', 1),
(112, 81, '1722329404374060956.webp', 0),
(113, 81, '1722329404374060963.webp', 0),
(114, 82, '1722765315430600611.webp', 1),
(115, 82, '1722765315430600612.webp', 0),
(116, 82, '1722765315430600613.webp', 0),
(117, 82, '1722765315430600614.webp', 0),
(118, 83, '1722765414437984935.webp', 1),
(119, 83, '1722765414439220726.webp', 0),
(120, 83, '1722765414439220728.webp', 0),
(121, 84, '1722765580430572992.webp', 0),
(122, 84, '1722765580430572993.webp', 1),
(123, 84, '1722765580430572994.webp', 0),
(124, 84, '1722765580430572995.webp', 0),
(125, 84, '1722765580430572997.webp', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `tovarType`
--

CREATE TABLE `tovarType` (
  `id` int NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tovarType`
--

INSERT INTO `tovarType` (`id`, `type`) VALUES
(1, 'BMX'),
(2, 'Гірський'),
(3, 'Міський'),
(4, 'Шосейний'),
(5, 'Test');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(70) NOT NULL,
  `rule` int NOT NULL DEFAULT '0',
  `avatar` varchar(255) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `number` varchar(17) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `rule`, `avatar`, `email`, `password`, `number`) VALUES
(11, 'Nazar', 1, '17193414841693909024dd9683e1341d7f8edf6708ce26cd3f2b.png', 'nazarsnitka813@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '0506291446');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `relationOrder`
--
ALTER TABLE `relationOrder`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tovar`
--
ALTER TABLE `tovar`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tovarPhoto`
--
ALTER TABLE `tovarPhoto`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tovarType`
--
ALTER TABLE `tovarType`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `buyers`
--
ALTER TABLE `buyers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `page`
--
ALTER TABLE `page`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `relationOrder`
--
ALTER TABLE `relationOrder`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `tovar`
--
ALTER TABLE `tovar`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT для таблицы `tovarPhoto`
--
ALTER TABLE `tovarPhoto`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT для таблицы `tovarType`
--
ALTER TABLE `tovarType`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
