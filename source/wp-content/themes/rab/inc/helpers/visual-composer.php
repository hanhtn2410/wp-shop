<?php
if( ! defined( 'ABSPATH' ) ) {
	exit;  // exit if accessed directly
}

if( ! rab_plugin_active( 'js_composer/js_composer.php' ) ) {
	return;
}

/**
 * =================================================
 * Visual composer default settings & options tweaks
 * =================================================
 */
if( ! function_exists( 'rab_admin_enqueue' ) ) {
	add_action( 'admin_enqueue_scripts', 'rab_admin_enqueue' );
	function rab_admin_enqueue() {
		wp_enqueue_style( 'rab-iconfont', RAB_CSS . 'icofont.css' );
	}
}

if( ! function_exists( 'rab_vc_enqueue_main_css_forever' ) ) {
	function rab_vc_enqueue_main_css_forever() {
	    wp_enqueue_style('js_composer_front');
	}

	add_action('wp_enqueue_scripts', 'rab_vc_enqueue_main_css_forever');
}


$param_func = 'vc_'.'add'.'_'.'shortcode_'.'param';
$param_func( 'vc_icons', 'rab_vc_icons_field', RAB_ASSETS_URI  . 'vc/vc_icon.js' );
function rab_vc_icons_field ($settings, $value) {
    $icons = array('angry-monster','bathtub','bird-wings','bow','brain-alt','butterfly-alt','castle','circuit','dart','dice-alt','disability-race','diving-goggle','fire-alt','flame-torch','flora-flower','flora','gift-box','halloween-pumpkin','hand-power','hand-thunder','king-crown','king-monster','love','magician-hat','native-american','open-eye','owl-look','phoenix','queen-crown','robot-face','sand-clock','shield-alt','ship-wheel','skull-danger','skull-face','snail','snow-alt','snow-flake','snowmobile','space-shuttle','star-shape','swirl','tattoo-wing','throne','touch','tree-alt','triangle','unity-hand','weed','woman-bird','animal-bat','animal-bear-tracks','animal-bear','animal-bird-alt','animal-bird','animal-bone','animal-bull','animal-camel-alt','animal-camel-head','animal-camel','animal-cat-alt-1','animal-cat-alt-2','animal-cat-alt-3','animal-cat-alt-4','animal-cat-with-dog','animal-cat','animal-cow-head','animal-cow','animal-crab','animal-crocodile','animal-deer-head','animal-dog-alt','animal-dog-barking','animal-dog','animal-dolphin','animal-duck-tracks','animal-eagle-head','animal-eaten-fish','animal-elephant-alt','animal-elephant-head-alt','animal-elephant-head','animal-elephant','animal-elk','animal-fish-alt-1','animal-fish-alt-2','animal-fish-alt-3','animal-fish-alt-4','animal-fish','animal-fox-alt','animal-fox','animal-frog-tracks','animal-frog','animal-froggy','animal-giraffe-alt','animal-giraffe','animal-goat-head-alt-1','animal-goat-head-alt-2','animal-goat-head','animal-gorilla','animal-hen-tracks','animal-horse-head-alt-1','animal-horse-head-alt-2','animal-horse-head','animal-horse-tracks','animal-jellyfish','animal-kangaroo','animal-lemur','animal-lion-alt','animal-lion-head-alt','animal-lion-head','animal-lion','animal-monkey-alt-1','animal-monkey-alt-2','animal-monkey-alt-3','animal-monkey','animal-octopus-alt','animal-octopus','animal-owl','animal-panda-alt','animal-panda','animal-panther','animal-parrot-lip','animal-parrot','animal-paw','animal-pelican','animal-penguin','animal-pig-alt','animal-pig','animal-pigeon-alt','animal-pigeon','animal-pigeons','animal-rabbit-running','animal-rat-alt','animal-rhino-head','animal-rhino','animal-rooster','animal-seahorse','animal-seal','animal-shrimp','animal-snail-alt-1','animal-snail-alt-2','animal-snail','animal-snake','animal-squid','animal-squirrel','animal-tiger-alt','animal-tiger','animal-turtle','animal-whale','animal-woodpecker','animal-zebra','brand-acer','brand-adidas','brand-adobe','brand-air-new-zealand','brand-airbnb','brand-aircell','brand-airtel','brand-alcatel','brand-alibaba','brand-aliexpress','brand-alipay','brand-amazon','brand-amd','brand-american-airlines','brand-android-robot','brand-android','brand-aol','brand-apple','brand-appstore','brand-asus','brand-ati','brand-att','brand-audi','brand-axiata','brand-bada','brand-bbc','brand-bing','brand-blackberry','brand-bmw','brand-box','brand-burger-king','brand-business-insider','brand-buzzfeed','brand-cannon','brand-casio','brand-china-mobile','brand-china-telecom','brand-china-unicom','brand-cisco','brand-citibank','brand-cnet','brand-cnn','brand-cocal-cola','brand-compaq','brand-copy','brand-debian','brand-delicious','brand-dell','brand-designbump','brand-designfloat','brand-disney','brand-dodge','brand-dove','brand-ebay','brand-eleven','brand-emirates','brand-espn','brand-etihad-airways','brand-etisalat','brand-etsy','brand-facebook','brand-fastrack','brand-fedex','brand-ferrari','brand-fitbit','brand-flikr','brand-forbes','brand-foursquare','brand-fox','brand-foxconn','brand-fujitsu','brand-general-electric','brand-gillette','brand-gizmodo','brand-gnome','brand-google','brand-gopro','brand-gucci','brand-hallmark','brand-hi5','brand-honda','brand-hp','brand-hsbc','brand-htc','brand-huawei','brand-hulu','brand-hyundai','brand-ibm','brand-icofont','brand-icq','brand-ikea','brand-imdb','brand-indiegogo','brand-intel','brand-ipair','brand-jaguar','brand-java','brand-joomshaper','brand-kickstarter','brand-kik','brand-lastfm','brand-lego','brand-lenovo','brand-levis','brand-lexus','brand-lg','brand-life-hacker','brand-line-messenger','brand-linkedin','brand-linux-mint','brand-linux','brand-lionix','brand-live-messenger','brand-loreal','brand-louis-vuitton','brand-mac-os','brand-marvel-app','brand-mashable','brand-mazda','brand-mcdonals','brand-mercedes','brand-micromax','brand-microsoft','brand-mobileme','brand-mobily','brand-motorola','brand-msi','brand-mts','brand-myspace','brand-mytv','brand-nasa','brand-natgeo','brand-nbc','brand-nescafe','brand-nestle','brand-netflix','brand-nexus','brand-nike','brand-nokia','brand-nvidia','brand-omega','brand-opensuse','brand-oracle','brand-panasonic','brand-paypal','brand-pepsi','brand-philips','brand-pizza-hut','brand-playstation','brand-puma','brand-qatar-air','brand-qvc','brand-readernaut','brand-redbull','brand-reebok','brand-reuters','brand-samsung','brand-sap','brand-saudia-airlines','brand-scribd','brand-shell','brand-siemens','brand-sk-telecom','brand-slideshare','brand-smashing-magazine','brand-snapchat','brand-sony-ericsson','brand-sony','brand-soundcloud','brand-sprint','brand-squidoo','brand-starbucks','brand-stc','brand-steam','brand-suzuki','brand-symbian','brand-t-mobile','brand-tango','brand-target','brand-tata-indicom','brand-techcrunch','brand-telenor','brand-teliasonera','brand-tesla','brand-the-verge','brand-thenextweb','brand-toshiba','brand-toyota','brand-tribenet','brand-ubuntu','brand-unilever','brand-vaio','brand-verizon','brand-viber','brand-vodafone','brand-volkswagen','brand-walmart','brand-warnerbros','brand-whatsapp','brand-wikipedia','brand-windows','brand-wire','brand-yahoobuzz','brand-yamaha','brand-youtube','brand-zain','bank-alt','barcode','basket','bill-alt','billboard','briefcase-alt-1','briefcase-alt-2','building-alt','businessman','businesswoman','cart-alt','chair','clip','coins','company','contact-add','deal','files','growth','id-card','idea','list','meeting-add','money-bag','people','pie-chart','presentation-alt','stamp','stock-mobile','support','tasks-alt','wheel','chart-arrows-axis','chart-bar-graph','chart-flow-alt-1','chart-flow-alt-2','chart-flow','chart-histogram-alt','chart-histogram','chart-line-alt','chart-line','chart-pie-alt','chart-pie','chart-radar-graph','cur-afghani-false','cur-afghani-minus','cur-afghani-plus','cur-afghani-true','cur-afghani','cur-baht-false','cur-baht-minus','cur-baht-plus','cur-baht-true','cur-baht','cur-bitcoin-false','cur-bitcoin-minus','cur-bitcoin-plus','cur-bitcoin-true','cur-bitcoin','cur-dollar-flase','cur-dollar-minus','cur-dollar-plus','cur-dollar-true','cur-dollar','cur-dong-false','cur-dong-minus','cur-dong-plus','cur-dong-true','cur-dong','cur-euro-false','cur-euro-minus','cur-euro-plus','cur-euro-true','cur-euro','cur-frank-false','cur-frank-minus','cur-frank-plus','cur-frank-true','cur-frank','cur-hryvnia-false','cur-hryvnia-minus','cur-hryvnia-plus','cur-hryvnia-true','cur-hryvnia','cur-lira-false','cur-lira-minus','cur-lira-plus','cur-lira-true','cur-lira','cur-peseta-false','cur-peseta-minus','cur-peseta-plus','cur-peseta-true','cur-peseta','cur-peso-false','cur-peso-minus','cur-peso-plus','cur-peso-true','cur-peso','cur-pound-false','cur-pound-minus','cur-pound-plus','cur-pound-true','cur-pound','cur-renminbi-false','cur-renminbi-minus','cur-renminbi-plus','cur-renminbi-true','cur-renminbi','cur-riyal-false','cur-riyal-minus','cur-riyal-plus','cur-riyal-true','cur-riyal','cur-rouble-false','cur-rouble-minus','cur-rouble-plus','cur-rouble-true','cur-rouble','cur-rupee-false','cur-rupee-minus','cur-rupee-plus','cur-rupee-true','cur-rupee','cur-taka-false','cur-taka-minus','cur-taka-plus','cur-taka-true','cur-taka','cur-turkish-lira-false','cur-turkish-lira-minus','cur-turkish-lira-plus','cur-turkish-lira-true','cur-turkish-lira','cur-won-false','cur-won-minus','cur-won-plus','cur-won-true','cur-won','cur-yen-false','cur-yen-minus','cur-yen-plus','cur-yen-true','cur-yen','android-nexus','android-tablet','apple-watch','drwaing-tablet','earphone','flash-drive','game-control','headphone-alt','htc-one','imac','ipad-touch','iphone','ipod-nano','ipod-touch','keyboard-alt','keyboard-wireless','laptop-alt','macbook','magic-mouse','microphone-alt','monitor','mouse','nintendo','playstation','psvita','radio-mic','refrigerator','samsung-galaxy','surface-tablet','washing-machine','wifi-router','wii-u','windows-lumia','wireless-mouse','xbox-360','arrow-down','arrow-left','arrow-right','arrow-up','block-down','block-left','block-right','block-up','bubble-down','bubble-left','bubble-right','bubble-up','caret-down','caret-left','caret-right','caret-up','circled-down','circled-left','circled-right','circled-up','collapse','cursor-drag','curved-double-left','curved-double-right','curved-down','curved-left','curved-right','curved-up','dotted-down','dotted-left','dotted-right','dotted-up','double-left','double-right','drag','drag1','drag2','drag3','expand-alt','hand-down','hand-drag','hand-drag1','hand-drag2','hand-drawn-alt-down','hand-drawn-alt-left','hand-drawn-alt-right','hand-drawn-alt-up','hand-drawn-down','hand-drawn-left','hand-drawn-right','hand-drawn-up','hand-left','hand-right','hand-up','line-block-down','line-block-left','line-block-right','line-block-up','long-arrow-down','long-arrow-left','long-arrow-right','long-arrow-up','rounded-collapse','rounded-double-left','rounded-double-right','rounded-down','rounded-expand','rounded-left-down','rounded-left-up','rounded-left','rounded-right-down','rounded-right-up','rounded-right','rounded-up','scroll-bubble-down','scroll-bubble-left','scroll-bubble-right','scroll-bubble-up','scroll-double-down','scroll-double-left','scroll-double-right','scroll-double-up','scroll-down','scroll-left','scroll-long-down','scroll-long-left','scroll-long-right','scroll-long-up','scroll-right','scroll-up','simple-down','simple-left-down','simple-left-up','simple-left','simple-right-down','simple-right-up','simple-right','simple-up','square-down','square-left','square-right','square-up','stylish-down','stylish-left','stylish-right','stylish-up','swoosh-down','swoosh-left','swoosh-right','swoosh-up','thin-double-left','thin-double-right','thin-down','thin-left','thin-right','thin-up','atom','award','bell-alt','book-alt','brainstorming','certificate-alt-1','certificate-alt-2','dna-alt-2','education','electron','fountain-pen','globe-alt','graduate-alt','group-students','hat-alt','hat','instrument','lamp-light','microscope-alt','paper','pen-alt-4','pen-nib','pencil-alt-5','quill-pen','read-book-alt','read-book','school-bag','school-bus','student-alt','student','teacher','test-bulb','test-tube-alt','university','emo-angry','emo-astonished','emo-confounded','emo-confused','emo-crying','emo-dizzy','emo-expressionless','emo-heart-eyes','emo-laughing','emo-nerd-smile','emo-open-mouth','emo-rage','emo-rolling-eyes','emo-sad','emo-simple-smile','emo-slightly-smile','emo-smirk','emo-stuck-out-tongue','emo-wink-smile','emo-worried','architecture-alt','architecture','barricade','bricks','calculations','cement-mix','cement-mixer','danger-zone','drill','eco-energy','eco-environmen','energy-air','energy-oil','energy-savings','energy-solar','energy-water','engineer','fire-extinguisher-alt','fix-tools','glue-oil','hammer-alt','help-robot','industries-alt-1','industries-alt-2','industries-alt-3','industries-alt-4','industries-alt-5','industries','labour','mining','paint-brush','pollution','power-zone','radio-active','recycle-alt','recycling-man','safety-hat-light','safety-hat','saw','screw-driver','settings-alt','tools-alt-1','tools-alt-2','tools-bag','trolley','trowel','under-construction-alt','under-construction','vehicle-cement','vehicle-crane','vehicle-delivery-van','vehicle-dozer','vehicle-excavator','vehicle-trucktor','vehicle-wrecking','worker-group','worker','wrench','file-audio','file-avi-mp4','file-bmp','file-code','file-css','file-document','file-eps','file-excel','file-exe','file-file','file-flv','file-gif','file-html5','file-image','file-iso','file-java','file-javascript','file-jpg','file-midi','file-mov','file-mp3','file-pdf','file-php','file-png','file-powerpoint','file-presentation','file-psb','file-psd','file-python','file-ruby','file-spreadsheet','file-sql','file-svg','file-text','file-tiff','file-video','file-wave','file-wmv','file-word','file-zip','apple','arabian-coffee','artichoke','asparagus','avocado','baby-food','banana','bbq','beans','beer','bell-pepper-capsicum','birthday-cake','bread','broccoli','burger','cabbage','carrot','cauli-flower','cheese','chef','cherry','chicken-fry','chicken','cocktail','coconut','coffee-alt','coffee-mug','coffee-pot','cola','corn','croissant','crop-plant','cucumber','cup-cake','dining-table','donut','egg-plant','egg-poached','farmer','farmer1','fast-food','fish','food-basket','food-cart','fork-and-knife','french-fries','fresh-juice','fruits','grapes','honey','hot-dog','hotel-alt','ice-cream-alt','ice-cream','ketchup','kiwi','layered-cake','lemon-alt','lobster','mango','milk','mushroom','noodles','onion','orange','pear','peas','pepper','pie-alt','pineapple','pizza-slice','pizza','plant','popcorn','potato','pumpkin','raddish','restaurant-menu','restaurant','salt-and-pepper','sandwich','sausage','shrimp','sof-drinks','soup-bowl','spoon-and-fork','steak','strawberry','sub-sandwich','sushi','taco','tea-pot','tea','tomato','waiter-alt','watermelon','wheat','abc','baby-cloth','baby-milk-bottle','baby-trolley','back-pack','candy','cycling','holding-hands','infant-nipple','kids-scooter','safety-pin','teddy-bear','toy-ball','toy-cat','toy-duck','toy-elephant','toy-hand','toy-horse','toy-lattu','toy-train','unique-idea','bag-alt','burglar','cannon-firing','cc-camera','cop-badge','cop','court-hammer','court','finger-print','handcuff-alt','handcuff','investigation','investigator','jail','judge','law-alt-1','law-alt-2','law-alt-3','law-book','law-document','law','lawyer-alt-1','lawyer-alt-2','lawyer','order','pistol','police-badge','police-cap','police-car-alt-1','police-car-alt-2','police-hat','police-van','police','protect','scales','thief-alt','thief','abacus-alt','abacus','angle','calculator-alt-1','calculator-alt-2','circle-ruler-alt','circle-ruler','compass-alt-1','compass-alt-2','compass-alt-3','compass-alt-4','degrees-alt-1','degrees-alt-2','degrees','golden-ratio','marker-alt-1','marker-alt-2','marker-alt-3','mathematical-alt-1','mathematical-alt-2','mathematical','pen-alt-1','pen-alt-2','pen-alt-3','pen-holder-alt-1','pen-holder','pencil-alt-1','pencil-alt-2','pencil-alt-3','pencil-alt-4','ruler-alt-1','ruler-alt-2','ruler-compass-alt','ruler-compass','ruler-pencil-alt-1','ruler-pencil-alt-2','ruler-pencil','ruler','rulers-alt','rulers','square-root','aids','ambulance','autism','bandage','bed-patient','blind','blood-drop','blood-test','blood','capsule','crutches','dna-alt-1','dna','doctor-alt','doctor','drug-pack','drug','eye-alt','first-aid-alt','garbage','heart-alt','heartbeat','herbal','hospital','icu','injection-syringe','laboratory','medical-sign-alt','medical-sign','nurse-alt','nurse','nursing-home','operation-theater','paralysis-disability','pills','prescription','pulse','stethoscope-alt','stethoscope','stretcher','surgeon-alt','surgeon','tablets','test-bottle','test-tube','thermometer-alt','tooth','xray','ui-add','ui-alarm','ui-battery','ui-block','ui-bluetooth','ui-brightness','ui-browser','ui-calculator','ui-calendar','ui-call','ui-camera','ui-cart','ui-cell-phone','ui-chat','ui-check','ui-clip-board','ui-clip','ui-clock','ui-close','ui-contact-list','ui-copy','ui-cut','ui-delete','ui-dial-phone','ui-edit','ui-email','ui-file','ui-fire-wall','ui-flash-light','ui-flight','ui-folder','ui-game','ui-handicapped','ui-head-phone','ui-home','ui-image','ui-keyboard','ui-laoding','ui-lock','ui-love-add','ui-love-broken','ui-love-remove','ui-love','ui-map','ui-message','ui-messaging','ui-movie','ui-music-player','ui-music','ui-mute','ui-network','ui-next','ui-note','ui-office','ui-password','ui-pause','ui-play-stop','ui-play','ui-pointer','ui-power','ui-press','ui-previous','ui-rate-add','ui-rate-blank','ui-rate-remove','ui-rating','ui-record','ui-remove','ui-reply','ui-rotation','ui-rss','ui-search','ui-settings','ui-social-link','ui-tag','ui-text-chat','ui-text-loading','ui-theme','ui-timer','ui-touch-phone','ui-travel','ui-unlock','ui-user-group','ui-user','ui-v-card','ui-video-chat','ui-video-message','ui-video-play','ui-video','ui-volume','ui-weather','ui-wifi','ui-zoom-in','ui-zoom-out','cassette-player','cassette','forward','game','guiter','headphone-alt-1','headphone-alt-2','headphone-alt-3','listening','megaphone-alt','megaphone','movie','mp3-player','multimedia','music-disk','music-note','pause','play-alt-1','play-alt-2','play-alt-3','play-pause','record','retro-music-disk','rewind','song-notes','sound-wave-alt','sound-wave','stop','video-alt','video-cam','volume-bar','volume-mute','youtube-play','amazon-alt','amazon','american-express-alt','american-express','apple-pay-alt','apple-pay','bank-transfer-alt','bank-transfer','braintree-alt','braintree','cash-on-delivery-alt','cash-on-delivery','checkout-alt','checkout','diners-club-alt-1','diners-club-alt-2','diners-club-alt-3','diners-club','discover-alt','discover','eway-alt','eway','google-wallet-alt-1','google-wallet-alt-2','google-wallet-alt-3','google-wallet','jcb-alt','jcb','maestro-alt','maestro','mastercard-alt','mastercard','payoneer-alt','payoneer','paypal-alt','paypal','sage-alt','sage','skrill-alt','skrill','stripe-alt','stripe','visa-alt','visa-electron','visa','western-union-alt','western-union','boy','business-man-alt-1','business-man-alt-2','business-man-alt-3','business-man','funky-man','girl-alt','girl','hotel-boy-alt','hotel-boy','man-in-glasses','user-alt-1','user-alt-2','user-alt-3','user-alt-4','user-alt-5','user-alt-6','user-alt-7','user-female','user-male','user-suited','user','users-alt-1','users-alt-2','users-alt-3','users-alt-4','users-alt-5','users-alt-6','users-social','users','waiter','woman-in-glasses','document-search','folder-search','home-search','job-search','map-search','restaurant-search','search-alt-1','search-alt-2','search','stock-search','user-search','social-aim','social-badoo','social-bebo','social-behance','social-blogger','social-bootstrap','social-brightkite','social-cloudapp','social-concrete5','social-designbump','social-designfloat','social-deviantart','social-digg','social-dotcms','social-dribble','social-dropbox','brand-drupal','social-ebuddy','social-ello','social-ember','social-envato','social-evernote','social-facebook','social-feedburner','social-folkd','social-friendfeed','social-ghost','social-github','social-gnome','social-google-buzz','social-google-map','social-google-plus','social-google-talk','social-hype-machine','social-instagram','brand-joomla','social-kickstarter','social-line','social-linux-mint','social-livejournal','social-magento','social-meetup','social-mixx','social-newsvine','social-nimbuss','social-opencart','social-oscommerce','social-pandora','social-picasa','social-pinterest','social-prestashop','social-qik','social-readernaut','social-reddit','social-rss','social-shopify','social-silverstripe','social-skype','social-slashdot','social-smugmug','social-steam','social-stumbleupon','social-technorati','social-telegram','social-tinder','social-tumblr','social-twitter','social-typo3','social-ubercart','social-viber','social-viddler','social-vimeo','social-vine','social-virb','social-virtuemart','social-wechat','brand-wordpress','social-xing','social-yahoo','social-yelp','social-zencart','badminton-birdie','baseball','baseballer','basketball-hoop','basketball','billiard-ball','boot-alt-1','boot-alt-2','bowling-alt','bowling','canoe','cheer-leader','climbing','corner','cyclist','dumbbell-alt','dumbbell','field-alt','field','football-alt','foul','goal-keeper','goal','golf-alt','golf-bag','golf-field','golf','golfer','gym-alt-1','gym-alt-2','gym-alt-3','gym','hand-grippers','heart-beat-alt','helmet','hockey-alt','hockey','ice-skate','jersey-alt','jersey','jumping','kick','leg','match-review','medal-alt','muscle-alt','muscle','offside','olympic-logo','olympic','padding','penalty-card','racer','racing-car','racing-flag-alt','racing-flag','racings-wheel','referee','refree-jersey','result','rugby-ball','rugby-player','rugby','runner-alt-1','runner-alt-2','runner','score-board','skiing-man','skydiving-goggles','snow-mobile','steering','substitute','swimmer','table-tennis','team-alt','team','tennis-player','tennis','time','track','tracking','trophy-alt','trophy','volleyball-alt','volleyball-fire','volleyball','water-bottle','whisle','win-trophy','align-center','align-left','align-right','all-caps','bold','brush','clip-board','code-alt','color-bucket','color-picker','copy-alt','copy-black','cut','delete-alt','edit-alt','eraser-alt','file-alt','font','header','indent','italic-alt','justify-all','justify-center','justify-left','justify-right','line-height','link-alt','listine-dots','listing-box','listing-number','marker','outdent','paper-clip','paragraph','pin','printer','redo','rotation','save','small-cap','strike-through','sub-listing','subscript','superscript','table','text-height','text-width','trash','underline','undo','unlink','air-balloon','airplane-alt','airplane','ambulance-crescent','ambulance-cross','articulated-truck','auto-rickshaw','bicycle-alt-1','bicycle-alt-2','bull-dozer','bus-alt-1','bus-alt-2','bus-alt-3','cable-car','car-alt-1','car-alt-2','car-alt-3','car-alt-4','concrete-mixer','delivery-time','excavator','fast-delivery','fire-truck-alt','fire-truck','fork-lift','free-delivery','golf-cart','helicopter','motor-bike-alt','motor-bike','motor-biker','oil-truck','police-car','rickshaw','rocket-alt-1','rocket-alt-2','sail-boat','scooter','sea-plane','ship-alt','speed-boat','taxi','tow-truck','tractor','traffic-light','train-line','train-steam','tram','truck-alt','truck-loaded','truck','van-alt','van','yacht','5-star-hotel','anchor-alt','beach-bed','camping-vest','coconut-alt','direction-sign','hill-side','island-alt','long-drive','map-pins','plane-ticket','sail-boat-alt-1','sail-boat-alt-2','sandals-female','sandals-male','travelling','breakdown','celsius','clouds','cloudy','compass-alt','dust','eclipse','fahrenheit','forest-fire','full-night','full-sunny','hail-night','hail-rainy-night','hail-rainy-sunny','hail-rainy','hail-sunny','hail-thunder-night','hail-thunder-sunny','hail-thunder','hail','hill-night','hill-sunny','hill','hurricane','island','meteor','night','rainy-night','rainy-sunny','rainy-thunder','rainy','showy-night-hail','snow-temp','snow','snowy-hail','snowy-night-rainy','snowy-night','snowy-rainy','snowy-sunny-hail','snowy-sunny-rainy','snowy-sunny','snowy-thunder-night','snowy-thunder-sunny','snowy-thunder','snowy-windy-night','snowy-windy-sunny','snowy-windy','snowy','sun-alt','sun-rise','sun-set','sunny-day-temp','sunny','thermometer','thinder-light','tornado','umbrella-alt','volcano','wave','wind-scale-0','wind-scale-1','wind-scale-2','wind-scale-3','wind-scale-4','wind-scale-5','wind-scale-6','wind-scale-7','wind-scale-8','wind-scale-9','wind-scale-10','wind-scale-11','wind-scale-12','wind-waves','wind','windy-hail','windy-night','windy-raining','windy-sunny','windy-thunder-raining','windy-thunder','windy','addons','address-book','adjust','alarm','anchor','archive','at','attachment','audio','auto-mobile','automation','baby','badge','bag','ban','bank','bar-code','bars','battery-empty','battery-full','battery-half','battery-low','beach','beaker','bear','beard','bed','bell','beverage','bicycle','bill','bin','binary','binoculars','bird','birds','black-board','bluetooth','bolt','bomb','book-mark','book','boot','box','brain','briefcase','broken','bucket','bucket1','bucket2','bug','building','bullet','bullhorn','bullseye','bus','butterfly','cab','calculator','calendar','camera-alt','camera','car','card','cart','cc','certificate','charging','chat','check-alt','check-circled','check','checked','children-care','clock-time','close-circled','close-line-circled','close-line-squared-alt','close-line-squared','close-line','close-squared-alt','close-squared','close','cloud-download','cloud-refresh','cloud-upload','cloud','code-not-allowed','code','coffee-cup','comment','compass','computer','connection','console','contacts','contrast','copy','copyright','credit-card','crop','crown','cube','cubes','culinary','dashboard-web','dashboard','data','database-add','database-locked','database-remove','database','delete','diamond','dice','disabled','disc','diskette','document-folder','download-alt','download','downloaded','earth','ebook','edit','eject','email','envelope-open','envelope','eraser','error','exchange','exclamation-circle','exclamation-square','exclamation-tringle','exclamation','exit','expand','external-link','external','eye-blocked','eye-dropper','eye','favourite','fax','female','file','film','filter','fire-burn','fire-extinguisher','fire','first-aid','flag-alt-1','flag-alt-2','flag','flash-light','flash','flask','focus','folder-open','folder','foot-print','football-american','football','game-console','game-pad','gavel','gear','gears','gift','glass','globe','graduate','graffiti','grocery','group','hammer','hand','hanger','hard-disk','headphone','heart-beat','heart','history','home','horn','hotel','hour-glass','id','image','inbox','infinite','info-circle','info-square','info','institution','interface','invisible','italic','jacket','jar','jewlery','karate','key-hole','key','keyboard','kid','label','lamp','laptop','layers','layout','leaf','leaflet','learn','legal','lego','lemon','lens','letter','letterbox','library','license','life-bouy','life-buoy','life-jacket','life-ring','light-bulb','lighter','lightning-ray','like','link','live-support','location-arrow','location-pin','lock','login','logout','lollipop','look','loop','luggage','lunch','lungs','magic-alt','magic','magnet','mail-box','mail','male','map','math','maximize','measure','medal','medical','medicine','mega-phone','memorial','memory-card','mic-mute','mic','micro-chip','microphone','microscope','military','mill','minus-circle','minus-square','minus','mobile-phone','molecule','money','moon','mop','muffin','music-alt','music-notes','music','mustache','mute-volume','navigation-menu','navigation','network-tower','network','news','newspaper','no-smoking','not-allowed','notebook','notepad','notification','numbered','opposite','optic','options','package','page','paint','paper-plane','paperclip','papers','paw','pay','pen','pencil','penguin-linux','pestle','phone-circle','phone','picture','pie','pine','pixels','play','plugin','plus-circle','plus-square','plus','polygonal','power','presentation','price','print','puzzle','qr-code','queen','question-circle','question-square','question','quote-left','quote-right','radio','random','recycle','refresh','repair','reply-all','reply','resize','responsive','retweet','road','robot','rocket','royal','rss-feed','safety','sale-discount','satellite','send-mail','server','settings','share-alt','share-boxed','share','shield','ship','shopping-cart','sign-in','sign-out','signal','site-map','smart-phone','soccer','sort-alt','sort','space','spanner','speech-comments','speed-meter','spinner-alt-1','spinner-alt-2','spinner-alt-3','spinner-alt-4','spinner-alt-5','spinner-alt-6','spinner','spreadsheet','square','ssl-security','star-alt-1','star-alt-2','star','street-view','sun','support-faq','tack-pin','tag','tags','tasks','telephone','telescope','terminal','thumbs-down','thumbs-up','tick-boxed','tick-mark','ticket','tie','toggle-off','toggle-on','tools','transparent','tree','umbrella','unlock','unlocked','upload-alt','upload','usb-drive','usb','vector-path','verification-check','video-clapper','video','volume-down','volume-off','volume-up','wall-clock','wall','wallet','warning-alt','warning','water-drop','web','wheelchair','wifi-alt','wifi','world','zigzag','zipped','social-500px','social-baidu-tieba','social-bbm-messenger','social-delicious','social-dribbble','social-facebook-messenger','social-flikr','social-foursquare','social-google-hangouts','social-kakaotalk','social-kik','social-kiwibox','social-linkedin','social-meetme','social-odnoklassniki','social-photobucket','social-qq','social-renren','social-slack','social-slidshare','social-snapchat','social-soundcloud','social-spotify','social-stack-exchange','social-stack-overflow','social-tagged','social-trello','social-twitch','social-vk','social-weibo','social-whatsapp','social-youku','social-youtube-play','social-youtube','brand-xiaomi');

    foreach( $icons as $icon ) {
        $icon_fields[] = sprintf('<span class="rab-icon icofont icofont-%s" data-name="%s"></span>', esc_attr($icon) , esc_attr($icon) );
    }

   return '<div class="my_param_block rab-icon-container">'
            .implode( $icon_fields )
            .'<input type="text" name="'.esc_attr($settings['param_name'])
            .'" class="wpb_vc_param_value wpb-textinput rab-input-vc-icon hidden-field-value '
            .esc_attr($settings['param_name']).' '.esc_attr($settings['type']).'_field" type="text" value="'. esc_attr($value) .'" />'
         .'</div>';
}

function rab_vc_imageselect_field ($settings, $value) {
   $options = $settings['value'];
    
    foreach( $options as $optionkey => $optionvalue ) {
        $image_options[] = sprintf('<span class="ep-image image-%s" data-name="%s"><img src="%s.png"></span>', esc_attr($optionvalue) , esc_attr($optionvalue) , esc_url(get_template_directory_uri() . '/lib/admin/img/vcimages/' . $optionkey) );
    }

   return '<div class="my_param_block ep-imageselect-container ' . (array_key_exists('class',$settings) ? $settings['class'] : '') .'">'
            .implode( $image_options )
            .'<input type="text" name="'.esc_attr($settings['param_name'])
            .'" class="wpb_vc_param_value wpb-textinput ep-input-vc-imageselect hidden-field-value '
            .esc_attr($settings['param_name']).' '.esc_attr($settings['type']).'_field" type="text" value="'. esc_attr($value) .'"/>'
         .'</div>';
}

function rab_vc_range_field ($settings, $value) {

    return '<div class="my_param_block ep-rangefield-container field clear-after">'
        .'<div class="label">'. esc_attr($settings['label']).'</div>'
            .'<input type="range" start="'.esc_attr($settings['min']).'" min="'.esc_attr($settings['min']).'" max="'.esc_attr($settings['max']).'" step="'.esc_attr($settings['step']).'"  value="'. esc_attr($value) .'" />'
            .'<input type="text" name="'.esc_attr($settings['param_name'])
            .'" class="wpb_vc_param_value wpb-textinput ep-input-vc-range hidden-field-value '
            .esc_attr($settings['param_name']).' '.esc_attr($settings['type']) . '_field" type="text" value="'. esc_attr($value) .'"/>'
        .'</div>';
}

function rab_vc_multi_select ($settings, $value) {
    $items = $settings['options'];
    $options = array();
    foreach( $items as $optionkey => $optionvalue ) {
        $options[] = sprintf('<input type="checkbox" name="%s" value="%s" class="ep-checkbox-field"> <span class="checkbox-label">%s</span>', $optionvalue , $optionkey , $optionvalue );
    }

    return '<div class="my_param_block ep-checkbox-container field clear-after">'
            .implode( $options )
            .'<input type="text" name="'.esc_attr($settings['param_name'])
            .'" class="wpb_vc_param_value wpb-textinput ep-input-vc-checkbox hidden-field-value '
            .esc_attr($settings['param_name']).' '.esc_attr($settings['type']) . '_field" type="text" value="'. esc_attr($value) .'"/>'
        .'</div>';
}

if ( ! function_exists( 'rab_js_composer_css_admin' ) ) {
	function rab_js_composer_css_admin() {
		if(!isset($_GET['page']) || $_GET['page'] != 'theme_settings')	{
			wp_enqueue_style( 'rab_vc_extend_css', RAB_CSS . 'admin/vc-extend.css' );
		}

	}
}

add_action( 'admin_enqueue_scripts', 'rab_js_composer_css_admin', 15 );

// Removing frontend editor
if(function_exists('vc_disable_frontend')){
    vc_disable_frontend();
}

// animation array
$animations = array(
	"None" => "none",
	"Fade in" => "fade-in",
	"Fade in from top" => "fade-in-top",
	"Fade in from left" => "fade-in-left",
	"Fade in from right" => "fade-in-right",
	"Fade in from bottom" => "fade-in-bottom",
    "Grow In" => "grow-in"
);

$fontsize = array (
    "20" => "20",
    "24" => "24",
    "32" => "32",
    "40" => "40",
    "48" => "48",
    "60" => "60",
    "80" => "80",
    "100" => "100",
);

$Customfontsize = array (
    "20" => "20",
    "24" => "24",
    "32" => "32",
    "40" => "40",
    "48" => "48",
    "60" => "60",
    "80" => "80",
    "100" => "100",
);

$contentfontsize = array (
    "12" => "12",
    "13" => "13",
    "14" => "14",
    "15" => "15",
    "16" => "16",
    "17" => "17",
    "18" => "18",
    "19" => "19",
    "20" => "20",
    "22" => "22",
    "24" => "24",
);

//all of social icons
$socialIcon = array (
	'Select one' => '',
    'Facebook' => 'social-facebook',
    'Twitter' => 'social-twitter',
    'Vimeo' =>'social-vimeo',
    'YouTube' => 'social-youtube-play',
    'Google+' =>'social-google-plus',
    'Dribbble' =>  'social-dribbble',
    'Tumblr' => 'social-tumblr',
    'linkedin' => 'social-linkedin',
    'Flickr' =>  'social-flickr',
    'Github'  => 'social-github',
    'RSS' =>  'social-rss',
    'Skype' =>  'social-skype',
    'WordPress' =>  'brand-wordpress',
    'Yahoo' =>  'social-yahoo',
    'Wechat'  => 'social-wechat',
    'Steam' => 'social-steam',
    'Reddit' =>  'social-reddit',
    'Kickstarter' => 'social-kickstarter',
    'StumbleUpon' => 'social-stumbleupon',
    'Pinterest' => 'social-pinterest',
    'DeviantArt' => 'social-deviantart',
    'Xing'  => 'social-xing',
    'Blogger' => 'social-blogger',
    'SoundCloud'  => 'social-soundcloud',
    'whatsapp'  => 'social-whatsapp',
    'Delicious' =>  'social-delicious',
    'Foursquare'  => 'social-foursquare',
    'Instagram'  => 'social-instagram',
    'Behance'  => 'social-behance',
	'Custom Social Network'=> 'custom',
);

//List of social icons with dark/light option
$socialIconDarkLight = array (
    'facebook',
    'twitter',
    'vimeo',
    'youtube-play',
    'google-plus',
    'dribbble',
    'tumblr',
    'linkedin',
    'flickr',
    'github',
    'lastfm',
    'paypal',
    'feed',
    'skype',
    'wordpress',
    'yahoo',
    'steam',
    'reddit-alien',
    'stumbleupon',
    'pinterest',
    'deviantart',
    'xing',
    'blogger',
    'soundcloud',
    'delicious',
    'foursquare',
    'instagram',
    'behance',
);

$portfolio_skills = array();
$cat_args = array(
    'orderby'       => 'term_id', 
    'order'         => 'ASC',
    'hide_empty'    => false,
);

$terms = get_terms('skills', $cat_args);
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){ // check is portfolio plugin is active or not 
    foreach($terms as $taxonomy) {
         $portfolio_skills[$taxonomy->slug] = $taxonomy->name;
    }
}

//------ Fetch gallery categories-------
$gallery_cats = array();
$cat_args = array(
    'orderby'       => 'term_id', 
    'order'         => 'ASC',
    'hide_empty'    => false,
);

$terms = get_terms('gallery_cat', $cat_args);
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){ // check is gallery plugin is active or not 
    foreach($terms as $taxonomy){
            $gallery_cats[$taxonomy->slug] = $taxonomy->name;
    }
}

//Remove animation from VC shortcodes
vc_remove_param('vc_icon', 'css_animation');
vc_remove_param('vc_separator', 'css_animation');
vc_remove_param('vc_text_separator', 'css_animation');
vc_remove_param('vc_facebook', 'css_animation');
vc_remove_param('vc_tweetmeme', 'css_animation');
vc_remove_param('vc_googleplus', 'css_animation');
vc_remove_param('vc_pinterest', 'css_animation');
vc_remove_param('vc_single_image', 'css_animation');
vc_remove_param('vc_tta_tabs', 'css_animation');
vc_remove_param('vc_tta_tour', 'css_animation');
vc_remove_param('vc_tta_accordion', 'css_animation');
vc_remove_param('vc_tta_accordion', 'css_animation');
vc_remove_param('vc_gmaps', 'css_animation');
vc_remove_param('vc_flickr', 'css_animation');
vc_remove_param('vc_basic_grid', 'css_animation');
vc_remove_param('vc_masonry_grid', 'css_animation');

/*-----------------------------------------------------------------------------------*/
/* Section
/*-----------------------------------------------------------------------------------*/
 // Remove VC Button Element
vc_remove_element( 'vc_section' );

/*-----------------------------------------------------------------------------------*/
/* Pricing box
/*-----------------------------------------------------------------------------------*/
vc_remove_param('mnky_pricing_box', 'css_animation');
vc_remove_param('mnky_pricing_box', 'css_animation_delay');



/*-----------------------------------------------------------------------------------*/
/* Accordion
/*-----------------------------------------------------------------------------------*/

// remove param style
vc_remove_param('vc_tta_accordion' , 'style');

// remove param shape
vc_remove_param('vc_tta_accordion' , 'shape');

// remove param color
vc_remove_param('vc_tta_accordion' , 'color');

// remove param no_fill
vc_remove_param('vc_tta_accordion' , 'no_fill');

// remove param spacing
vc_remove_param('vc_tta_accordion' , 'spacing');

// remove param gap
vc_remove_param('vc_tta_accordion' , 'gap');

// remove param autoplay
vc_remove_param('vc_tta_accordion' , 'autoplay');

// remove param icon
vc_remove_param('vc_tta_accordion' , 'c_icon');

/*-----------------------------------------------------------------------------------*/
/* Tabs
/*-----------------------------------------------------------------------------------*/

// remove param style
vc_remove_param('vc_tta_tabs' , 'style');

// remove param tab
vc_remove_param('vc_tta_tabs' , 'title');

// remove param shape
vc_remove_param('vc_tta_tabs' , 'shape');

// remove param shape
vc_remove_param('vc_tta_tabs' , 'alignment');

// remove param color
vc_remove_param('vc_tta_tabs' , 'color');

// remove param no_fill_content_area
vc_remove_param('vc_tta_tabs' , 'no_fill_content_area');

// remove param spacing
vc_remove_param('vc_tta_tabs' , 'spacing');

// remove param gap
vc_remove_param('vc_tta_tabs' , 'gap');

// remove param pagination_style
vc_remove_param('vc_tta_tabs' , 'pagination_style');

// remove param pagination_color
vc_remove_param('vc_tta_tabs' , 'pagination_color');


vc_add_param("vc_tta_tabs", array(
			'type' => 'dropdown',
			'param_name' => 'alignment',
			'value' => array(
				esc_html__( 'Center', 'rab' ) => 'center',
				esc_html__( 'Left', 'rab' ) => 'left',
				esc_html__( 'Right', 'rab' ) => 'right',
			),
			'heading' => esc_html__( 'Alignment', 'rab' ),
			'description' => esc_html__( 'Select tabs section title alignment.', 'rab' ),
));

/*-----------------------------------------------------------------------------------*/
/* Tour
/*-----------------------------------------------------------------------------------*/
// remove param style
vc_remove_param('vc_tta_tour' , 'style');

// remove param shape
vc_remove_param('vc_tta_tour' , 'shape');

// remove param color
vc_remove_param('vc_tta_tour' , 'color');

// remove param no_fill_content_area
vc_remove_param('vc_tta_tour' , 'no_fill_content_area');

// remove param spacing
vc_remove_param('vc_tta_tour' , 'spacing');

// remove param gap
vc_remove_param('vc_tta_tour' , 'gap');

// remove param controls_size
vc_remove_param('vc_tta_tour' , 'controls_size');

// remove param pagination_style
vc_remove_param('vc_tta_tour' , 'pagination_style');

// remove param pagination_color
vc_remove_param('vc_tta_tour' , 'pagination_color');

/*-----------------------------------------------------------------------------------*/
/* Row
/*-----------------------------------------------------------------------------------*/

// remove VC default row animation
vc_remove_param( 'vc_row', 'css_animation');

// remove content placement
vc_remove_param( 'vc_row', 'gap');

// remove parallax speed of video
vc_remove_param( 'vc_row', 'parallax_speed_video');

// remove parallax speed of bg
vc_remove_param( 'vc_row', 'parallax_speed_bg');

// remove font color
vc_remove_param('vc_row', 'font_color');

// remove margin bottom
vc_remove_param('vc_row', 'margin_bottom');

// remove bg color
vc_remove_param('vc_row', 'bg_color');

// remove bg image
vc_remove_param('vc_row', 'bg_image');

// remove row padding
vc_remove_param( 'vc_row', 'padding' );

//remove image repeat Option
vc_remove_param( 'vc_row', 'bg_image_repeat' );

//remove css option
vc_remove_param( 'vc_row', 'css' );

//remove class option
vc_remove_param( 'vc_row', 'el_class' );

//remove full-width option
vc_remove_param( 'vc_row', 'full_width');

//remove parallax option
vc_remove_param( 'vc_row', 'parallax');

//remove parallax image
vc_remove_param( 'vc_row', 'parallax_image');

//remove row id
vc_remove_param( 'vc_row', 'el_id');

//remove row video bg
vc_remove_param( 'vc_row', 'video_bg');

//remove row video bg
vc_remove_param( 'vc_row', 'video_bg_url');

//remove row video bg
vc_remove_param( 'vc_row', 'full_height');

// remove content placement
vc_remove_param( 'vc_row', 'content_placement');

// remove parallax type
vc_remove_param( 'vc_row', 'video_bg_parallax');

// remove parallax type
vc_remove_param( 'vc_row', 'equal_height');

// remove parallax type
vc_remove_param( 'vc_row', 'columns_placement');

$row_setting = array (
  "name" => "Row, Parallax, video, interactive bg",
  'show_settings_on_create' => true,
  "weight" => 10,
);
vc_map_update('vc_row', $row_setting);

$separator_setting = array (
  'show_settings_on_create' => true,
  "controls"	=> '',
  "weight" => 9,
);
vc_map_update('vc_separator', $separator_setting);

vc_add_param("vc_row", array(
    "type" => "dropdown",
    "class" => "",
    "holder" => "span",
    "show_settings_on_create"=>true,
    "heading" => esc_html__("Container Type", "rab"),
    "param_name" => "row_type",
    "description" => esc_html__("Choose different types of containers and set the options.", "rab"),
    "value" => array(
        "Row" => "row",
        "Parallax" => "parallax",
        "Interactive background" => "interactive_background",
        "Video" => "video",
    ),
));

vc_add_param("vc_row", array(
    "type" => "vc_multiselect",
    "class" => "",
    "heading" => esc_html__("Mute video", "rab"), 
    "param_name" => "sound",
    "options" => array("off" => "Mute video"),
    "description" => esc_html__("Mute video of background", "rab"),
    "value" => "",
    "dependency" => array(
        'element' => "row_type", 
        'value' => array('video')
    )
));  

vc_add_param("vc_row", array(
    "type" => "checkbox",
    "class" => "",
    "heading" => esc_html__("Equal height", "rab"), 
    "param_name" => "equal_height",
    "description" => esc_html__("If checked columns will be set to equal height.", "rab"),
    "value" => "",
    'group'		=> esc_html__( "Inner Columns",  "rab"),
));  

vc_add_param("vc_row", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("Columns gap", "rab"),
    "param_name" => "gap",
    "description" => esc_html__("Select gap between columns in row.", "rab"),
    "value" => array(
        "30px - default" => "30",
        "0px" => "zero",
        "1px" => "1",
        "5px" => "5",
        "10px" => "10",
        "15px" => "15",
        "20px" => "20",
        "25px" => "25",
        "35px" => "35", 
    ),
    'group'		=> esc_html__( "Inner Columns",  "rab"),
));

vc_add_param("vc_row", array(
    "type" => "checkbox",
    "class" => "",
    "heading" => esc_html__("Full height", "rab"), 
    "param_name" => "full_height",
    "description" => esc_html__("If checked row will be set to full height.", "rab"),
    "value" => "",
));  

vc_add_param("vc_row", array(
    "type" => "dropdown",
    "class" => "",
    'heading' => esc_html__( 'Columns position', 'rab' ),
    "param_name" => "columns_placement",
    'description' => esc_html__( 'Select columns position within row.', 'rab' ),
    'value' => array(
	    esc_html__( 'Middle', 'rab' ) => 'middle',
	    esc_html__( 'Top', 'rab' ) => 'top',
	    esc_html__( 'Bottom', 'rab' ) => 'bottom',
    ),
    'dependency' => array(
		'element' => 'full_height',
		'not_empty' => true,
	),
));

// row spacing - Padding
vc_add_param("vc_row", array(
    "type" => "textfield",
    "heading" => esc_html__("Padding Top", "rab"),
    "param_name" => "row_padding_top",
    "description" => esc_html__("insert top padding for current row . example : 200 ", "rab"),
    'group'		=> esc_html__( "Padding",  "rab"),
));

vc_add_param("vc_row", array(
    "type" => "textfield",
    "heading" => esc_html__("Padding Bottom", "rab"),
    "param_name" => "row_padding_bottom",
    "description" => esc_html__("Insert bottom padding for current row . example : 200", "rab"),
    'group'		=> esc_html__( "Padding",  "rab"),
));

vc_add_param("vc_row", array(
    "type" => "textfield",
    "heading" => esc_html__("Padding Right", "rab"),
    "param_name" => "row_padding_right",
    "description" => esc_html__("Insert Right padding for current row . example : 200", "rab"),
    'group'		=> esc_html__( "Padding",  "rab"),
));

vc_add_param("vc_row", array(
    "type" => "textfield",
    "heading" => esc_html__("Padding Left", "rab"),
    "param_name" => "row_padding_left",
     "description" => esc_html__("Insert left padding for current row . example : 200", "rab"),
    'group'		=> esc_html__( "Padding",  "rab"),
));

// row spacing - margin
vc_add_param("vc_row", array(
    "type" => "textfield",
    "heading" => esc_html__("Margin Top", "rab"),
    "param_name" => "row_margin_top",
     "description" => esc_html__("Insert top margin for current row . example : 200", "rab"),
    'group'		=> esc_html__( "Margin",  "rab"),
));

vc_add_param("vc_row", array(
    "type" => "textfield",
    "heading" => esc_html__("Margin Bottom", "rab"),
    "param_name" => "row_margin_bottom",
    "description" => esc_html__("Insert bottom margin for current row . example : 200", "rab"),
    'group'		=> esc_html__( "Margin",  "rab"),
));


vc_add_param("vc_row", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("Type", "rab"),
    "param_name" => "type",
    "description" => esc_html__("Full-width will use all of your screen width, while Boxed will created an invisible box in middle of your screen.", "rab"),
    "value" => array(
        "Boxed" => "grid",
        "Full Width" => "full_width",
    ),
    "dependency" => Array(
        'element' => "row_type", 
        'value' => array('row')
    )
));
                        
//background image 
vc_add_param("vc_row", array(
    "type" => "attach_image",
    "class" => "",
    "heading" => esc_html__("Image URL", "rab"),
    "param_name" => "background_img_id",
    "description" => esc_html__("Choose an image to be used as this section's background.", "rab"),
    "value" => "",
    "dependency" => Array(
        'element' => "row_type", 
        'value' => array('row','parallax', 'interactive_background')
       
    )  
));

vc_add_param("vc_row", array(
    "type" => "dropdown",
    "heading" => esc_html__("background image position", "rab"),
    "param_name" => "background_position",
    "description" => esc_html__("Choose background position for bckground image.", "rab"),
    "value" => array(
 		"Center Center" => "center center",
 		"Center Top" => "center top",
 		"Center Bottom" => "center bottom",
 		"Left Top" => "left top",
 		"Left Center" => "left center",
 		"Left Bottom" => "left bottom",
 		"Right Top" => "right top",
 		"Right Center" => "right center",
 		"Right Bottom" => "right bottom",
    ),
    "dependency" => Array(
        'element' => "row_type", 
        'value' => array('parallax','row')
    )
));

//background color
vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
    "heading" => esc_html__("Background Color", "rab"),
	"param_name" => "background_color",
    "description" => esc_html__("Choose a color to be used as this section's background. Please noticed that background color, has higher priority than background image.", "rab"),
	"value" => "",
	"description" => "",
	"dependency" => Array(
        'element' => "row_type", 
        'value' => array('row','expandable','content_menu')
    )
));

// Add min height For row 
vc_add_param("vc_row", array(
    "type" => "textfield",
    "heading" => esc_html__("Minimum Height", "rab"),
    "param_name" => "min_height",
    "description" => esc_html__("Insert minimum height for parallax section . example : 550", "rab"),
    "dependency" => Array(
        'element' => "row_type", 
        'value' => array('parallax','interactive_background')
    )
));

// parallax speed
vc_add_param("vc_row", array(
    "type" => "textfield",
    "class" => "",
    "heading" => esc_html__("Parallax Speed",  "rab"),
    "param_name" => "parallax_speed",
    "description" => esc_html__("parallax speed 0 = page scrolling speed ,parallax speed above 0 = parallax is faster than page scrolling speed. Enter a number between 0 - 100", "rab"),
    "value" => "100",
    "dependency" => Array(
        'element' => "row_type", 
        'value' => array('parallax')
    )
));

// video webm
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Video background (webm) file url",
	"value" => "",
	"param_name" => "video_webm",
	"description" => "",
    "dependency" => Array(
        'element' => "row_type", 
        'value' => array('video')
    )
));

// video Mp4
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Video background (mp4) file url",
	"value" => "",
	"param_name" => "video_mp4",
	"description" => "",
	"dependency" => Array(
        'element' => "row_type", 
        'value' => array('video')
    )
));

//Video Preview Image 
vc_add_param("vc_row", array(
    "type" => "attach_image",
    "class" => "",
    "heading" => esc_html__("Video Preview Image", "rab"),
    "param_name" => "video_image",
    "value" => "",
    "description" => esc_html__("Enter an image address which will be shown instead of video in tablet and mobile devices. Also it will be shown if the video does not load correctly.", "rab"),
    "dependency" => Array(
        'element' => "row_type", 
        'value' => array('video')
       
    )  
));

// video height
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Video Section Height",
	"value" => "",
	"param_name" => "video_height",
	"description" => esc_html__("Use pixels (px). example :  550px", "rab"),
	"dependency" => Array(
        'element' => "row_type", 
        'value' => array('video')
    )
));

// Overlay Texture
vc_add_param("vc_row", array(
	"type" => "vc_imageselect",
	"class" => "textures",
	"heading" => esc_html__("Overlay Texture",  "rab"),
	"param_name" => "overlay_texture",
    "value" => array(
		"none" => "texture1",
        "texture2" => "texture2",
        "texture3" => "texture3",
        "texture4" => "texture4",
        "texture5" => "texture5",
        "texture6" => "texture6",
        "texture7" => "texture7",
        "texture8" => "texture8",
    ),
	"dependency" => array(
        "element" => "row_type",
        'value' => array('video','parallax','interactive_background'),
	)
));

// Overlay color
vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => esc_html__("Overlay Color", "rab"),
	"param_name" => "overlay_color",
	"value" => "",
	"description" => esc_html__("Select optional overlay color.", "rab") , 
    "dependency" => array(
		"element" => "row_type",
        'value' => array('video','parallax','interactive_background'),
	)
    
));

vc_add_param("vc_row", array(
    'type' => 'textfield',
    'heading' => esc_html__( 'Extra class name', 'rab' ),
    'param_name' => 'el_class',
    'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'rab' )
));

vc_add_param("vc_row",array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("Animation", "rab"),
    "param_name" => "row_animation",
    "description" => esc_html__("Select animation type", "rab") ,
    "value" => $animations,
    "group" => esc_html__('Animation','rab')
));

vc_add_param("vc_row",array(
    "type" => "textfield",
    "class" => "",
    "heading" => esc_html__("Animation Delay", "rab"),
    "param_name" => "row_animation_delay",
    "value" => "",
    "description" => esc_html__("Enter animation delay (in milliseconds), for example if you want 3 seconds delay, you should enter 3000 .", "rab") ,
    "group" => esc_html__('Animation','rab')
));


/*-----------------------------------------------------------------------------------*/
/* VC Column
/*-----------------------------------------------------------------------------------*/
vc_remove_param('vc_column', 'css_animation');
vc_add_param("vc_column",array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("Vertical Position", "rab"),
    "param_name" => "vertical_position",
    "description" => esc_html__("Specify the vertical position of the content. ( works only On Equal height row)", "rab") ,
        'value' => array(
            esc_html__( 'Top', 'rab' ) => 'top',
            esc_html__( 'Middle', 'rab' ) => 'middle',
            esc_html__( 'Bottom', 'rab' ) => 'bottom',
    ),
));


/*-----------------------------------------------------------------------------------*/
/* VC Column
/*-----------------------------------------------------------------------------------*/


vc_add_param("vc_column_inner",array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("Vertical Position", "rab"),
    "param_name" => "vertical_position",
    "description" => esc_html__("Specify the vertical position of the content. ( works only On Equal height row)", "rab") ,
        'value' => array(
            esc_html__( 'Top', 'rab' ) => 'top',
            esc_html__( 'Middle', 'rab' ) => 'middle',
            esc_html__( 'Bottom', 'rab' ) => 'bottom',
    ),
));


/*-----------------------------------------------------------------------------------*/
/*  contact form 7
/*-----------------------------------------------------------------------------------*/

    vc_add_param("contact-form-7", array(
        "type" => "dropdown",
        "class" => "",
        'heading' => esc_html__('Style', 'rab' ),
        'param_name' => 'html_class',
        'description' => esc_html__( 'Select contact form style.', 'rab' ),
        "value" => array(
            "Dark" => "dark_styles",
            "Light" => "light_styles"
        ),
    ));      

    // remove param title
    vc_remove_param('contact-form-7' , 'title');
      

/*-----------------------------------------------------------------------------------*/
/* VC block text
/*-----------------------------------------------------------------------------------*/

$column_text_setting = array (
  "weight" => 9,
);
vc_map_update('vc_column_text', $column_text_setting);

vc_remove_param('vc_column_text', 'css_animation');
vc_add_param("vc_column_text",array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("Animation", "rab"),
    "param_name" => "text_animation",
    "description" => esc_html__("Select animation type", "rab") ,
    "value" => $animations,
    "group" => esc_html__('Animation','rab')
));

vc_add_param("vc_column_text",array(
    "type" => "textfield",
    "class" => "",
    "heading" => esc_html__("Animation Delay", "rab"),
    "param_name" => "text_animation_delay",
    "value" => "",
    "description" => esc_html__("Enter animation delay (in milliseconds), for example if you want 3 seconds delay, you should enter 3000 .", "rab") ,
    "group" => esc_html__('Animation','rab')
));

/*-----------------------------------------------------------------------------------*/
/* Separator
/*-----------------------------------------------------------------------------------*/

vc_remove_param('vc_separator', 'style');
vc_remove_param('vc_separator', 'align');
vc_remove_param('vc_separator', 'el_width');
vc_remove_param('vc_separator', 'el_class');
vc_remove_param('vc_separator', 'accent_color');
vc_remove_param('vc_separator', 'color');
vc_remove_param('vc_separator', 'border_width');
vc_remove_param('vc_separator', 'css'); // remove design tab options

vc_add_param("vc_separator", array(
    "type" => "colorpicker",
    "holder" => "div",
    "class" => "",
    "heading" => esc_html__("Separator's Color", "rab"),
    "param_name" => "color",
    "value" => "",
    "description" => esc_html__("Select optional Separator's color ", "rab") ,  
));

// Separator
vc_add_param("vc_separator", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("Separator Size", "rab"), 
    "param_name" => "size",
    "description" => esc_html__("Choose the size of separator", "rab") ,
    "value" => array(
        "Full Width" => "full",
        "Small" => "small",
        "Small Center" => "small-center",
        "Extra Small" => "extra-small", 
        "Extra Small Center" => "extra-small-center",
        "Medium" => "medium", 
        "Medium Center" => "medium-center"
        )
));

vc_add_param("vc_separator", array(
    "type" => "textfield",
    "heading" => esc_html__("Margin Top", "rab"),
    "param_name" => "separator_margin_top",
    "description" => esc_html__("Insert top margin for current separator . example : 200", "rab"),
    'group'		=> esc_html__( "Margin",  "rab"),
));

vc_add_param("vc_separator", array(
    "type" => "textfield",
    "heading" => esc_html__("Margin Bottom", "rab"),
    "param_name" => "separator_margin_bottom",
    "description" => esc_html__("Insert bottom margin for current separator . example : 200", "rab"),
    'group'		=> esc_html__( "Margin",  "rab"),
));

vc_add_param("vc_separator", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("Border style", "rab"), 
    "param_name" => "border_style",
    "description" => esc_html__("Select border style", "rab") ,
    "value" => array(
        "Solid" => "solid",
        "Dashed" => "dashed",
        "Dotted" => "dotted",
        "Double" => "double",
        "Groove" => "groove",
        "Inset" => "inset",
        "Outset" => "outset",
        "Ridge" => "ridge",
    ),
));

vc_add_param("vc_separator", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("Separator Size", "rab"), 
    "param_name" => "pxthickness",
    "description" => esc_html__("Select thickness of separator", "rab") ,
    "value" => array(
        "1px" => "1",
        "2px" => "2",
        "3px" => "3",
        "4px" => "4",
        "5px" => "5",
        "6px" => "6",
        "7px" => "7",
        "8px" => "8",
        "9px" => "9",
        "10px" => "10", 
    ),
)); 

/*-----------------------------------------------------------------------------------*/
/* Title separator
/*-----------------------------------------------------------------------------------*/

$text_separator_setting = array (
  "weight" => 9,
);
vc_map_update('vc_text_separator', $text_separator_setting);

vc_remove_param('vc_text_separator', 'color');
vc_remove_param('vc_text_separator', 'accent_color');
vc_remove_param('vc_text_separator', 'style');
vc_remove_param('vc_text_separator', 'el_width');
vc_remove_param('vc_text_separator', 'el_class');
vc_remove_param('vc_text_separator', 'border_width');
vc_remove_param('vc_text_separator', 'align');
vc_remove_param('vc_text_separator', 'css'); // remove design tab options

vc_add_param("vc_text_separator", array(
    "type" => "colorpicker",
    "holder" => "div",
    "icon" => "icon-wpb-text-separator",
    "class" => "",
    "heading" => esc_html__("Separator's Color", "rab"),
    "param_name" => "color",
    "value" => "",
    "description" => esc_html__("Select optional Separator's color ", "rab") ,  
));

vc_add_param("vc_text_separator", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => esc_html__("Border Style", "rab"), 
    "param_name" => "border_style",
    "description" => esc_html__("Select border style", "rab") ,
    "value" => array(
        "Solid" => "solid",
        "Dashed" => "dashed",
        "Dotted" => "dotted",
        "Double" => "double",
        "Groove" => "groove",
        "Inset" => "inset",
        "Outset" => "outset",
        "Ridge" => "ridge",
    ),
));

vc_add_param("vc_text_separator", array(
    "type" => "colorpicker",
    "holder" => "",
    "class" => "",
    "heading" => esc_html__("Title's Color", "rab"),
    "param_name" => "title_color",
    "value" => "",
    "description" => esc_html__("Select optional title color.", "rab") ,  
));

vc_add_param("vc_text_separator", array(
    "type" => "dropdown",
    "holder" => "",
    "class" => "",
    "heading" => esc_html__("Title font-weight", "rab"), 
    "param_name" => "title_weight",
    "description" => esc_html__("Select title font weight", "rab") ,
    "value" => array(
        "Bold" => "bold",
        "Normal" => "normal",
    ),
));

vc_add_param("vc_text_separator", array(
    "type" => "textfield",
    "heading" => esc_html__("Margin Top", "rab"),
    "param_name" => "separator_margin_top",
    "description" => esc_html__("Insert top margin for current separator . example : 200", "rab"),
    'group'		=> esc_html__( "Margin",  "rab"),
));

vc_add_param("vc_text_separator", array(
    "type" => "textfield",
    "heading" => esc_html__("Margin Bottom", "rab"),
    "param_name" => "separator_margin_bottom",
    "description" => esc_html__("Insert bottom margin for current separator . example : 200", "rab"),
    'group'		=> esc_html__( "Margin",  "rab"),
));

vc_add_param("vc_text_separator", array(
    "type" => "dropdown",
    "holder" => "",
    "class" => "",
    "heading" => esc_html__("Separator line thickness", "rab"), 
    "param_name" => "pxthickness",
    "description" => esc_html__("Select thickness of separator", "rab") ,
    "value" => array(
        "1px" => "1",
        "2px" => "2",
        "3px" => "3",
        "4px" => "4",
        "5px" => "5",
        "6px" => "6",
        "7px" => "7",
        "8px" => "8",
        "9px" => "9",
        "10px" => "10", 
    ),
));

vc_add_param("vc_text_separator", array(
    "type" => "dropdown",
    "holder" => "",
    "class" => "",
    "heading" => esc_html__("Title Font size", "rab"), 
    "param_name" => "title_font_size",
    "description" => esc_html__("Select separator title font size", "rab") ,
    "value" => $Customfontsize,
)); 

vc_add_param("vc_text_separator", array(
    "type" => "dropdown",
    "holder" => "",
    "class" => "",
    "heading" => esc_html__("Enable border right/left For Title", "rab"), 
    "param_name" => "title_border_enable",
    "description" => esc_html__("Enable or Disbale right/left title border", "rab") ,
    "value" => array(
       "Enable" => "enable",
	   "Disable" => "disable"
    ),
)); 

/*-----------------------------------------------------------------------------------*/
/* toggle
/*-----------------------------------------------------------------------------------*/

vc_remove_param('vc_toggle', 'size');
vc_remove_param('vc_toggle', 'color');
vc_remove_param('vc_toggle', 'style');
vc_remove_param('vc_toggle', 'css_animation');

$vc_toggle_setting = array (
  "weight" => 9,
);
vc_map_update('vc_toggle', $vc_toggle_setting);

/*-----------------------------------------------------------------------------------*/
/* SoundCloud
/*-----------------------------------------------------------------------------------*/

vc_map( 
	array(
		"name" => "SoundCloud",
		"base" => "audio_soundcloud",
		"category" => 'RAB Elements',
		"icon" => "icon-wpb-soundcloud",
        "weight" => 9,
		"params" => array(
				array(
					"type" => "textfield",
					"holder" => "",
                    "admin_label" => true,
					"class" => "",
					"heading" => esc_html__("SoundCloud URL", "rab"),
					"param_name" => "soundcloud_id",
					"value" => "",
					"description" => esc_html__("Enter SoundCloud track URL here", "rab")
				),
                array(
					"type" => "dropdown",
					"class" => "",
                    "admin_label" => true,
					"heading" => esc_html__("SoundCloud Player Style", "rab"),
					"param_name" => "soundcloud_style",
					"value" => array(
                        "Full background album art" => "full_width_thumbnail",
                        "Thumbnail album art" => "small_thumbnail",
                    ),
					"description" => esc_html__("Choose a style for SoundCloud element.", "rab")
				    ),		
			    
				array(
					"type" => "textfield",
					"holder" => "div",
					"class" => "",
                    "admin_label" => true,
					"heading" => esc_html__("SoundCloud Player Height", "rab"),
					"param_name" => "soundcloud_height",
					"value" => "",
					"description" => esc_html__("Enter SoundCloud height, for example 300.", "rab"),
                    "dependency" => Array(
                        'element' => 'soundcloud_style', 
                        'value' => 'full_width_thumbnail',
                     )
                  ),array(
					"type" => "colorpicker",
				    "holder" => "div",
                    "admin_label" => true,
				    "class" => "",
				    "heading" => esc_html__("Player Color", "rab"),
				    "param_name" => "soundcloud_color",
				    "description" => "",
                    "dependency" => Array(
                        'element' => 'soundcloud_style', 
                        'value' => 'small_thumbnail',
                     )
                  ),
			),
		)
	) ;

/*-----------------------------------------------------------------------------------*/
/* Embed Video 
/*-----------------------------------------------------------------------------------*/

vc_map( 
	array(
		"name" => "Embed Video",
		"base" => "embed_video",
		"category" => 'RAB Elements',
        "icon" => "icon-wpb-embed_video",
        "weight" => 9,
		"params" => array(
            array(
                "type" => "dropdown",
                "admin_label" => true,
                "class" => "",
                "heading" => esc_html__("Video Display Type", "rab"),
                "param_name" => "video_display_type",
                "value" => array(
                    "local Video" => "local_video",
	                "Embedded Video (Youtube)" => "embeded_video_youtube",
                    "Embedded Video (Vimeo)" => "embeded_video_vimeo",
                    "Local Video Popup" => "local_video_popup",
                    "Embedded Video  ( Youtube Popup )" => "embeded_video_youtube_popup",
                    "Embedded Video ( Vimeo Popup )" => "embeded_video_vimeo_popup",
                ),
                "description" => esc_html__("Select video type.", "rab"),
            ),
            array(
			    'type' => 'dropdown',
			    'heading' => esc_html__( 'Video Aspect Ratio', 'rab' ),
			    'param_name' => 'el_aspect',
			    'value' => array(
				    '16:9' => '169',
				    '4:3' => '43',
				    '2.35:1' => '235',
			    ),
			    'description' => esc_html__( 'Select video aspect ratio.', 'rab' ),
                "dependency" => Array(
                    'element' => 'video_display_type', 
                    'value' => array('embeded_video_youtube','embeded_video_vimeo'),
                )
		    ),
            array(
				"type" => "dropdown",
				"admin_label" => true,
				"class" => "",
				"heading" => esc_html__("Auto-play", "rab"),
				"param_name" => "video_autoplay",
				"value" => array(
                    "Enable" => "enable",
		            "Disable" => "disable"
	            ),
				"description" => esc_html__("Enable or disable video auto-play.", "rab") ,   
                "dependency" => Array(
                    'element' => 'video_display_type', 
                    'value' => array('local_video','local_video_popup','embeded_video_youtube_popup', 'embeded_video_vimeo_popup'),
                )
		    ),
            array(
                "type" => "attach_image",
                "class" => "",
                "heading" => esc_html__("Video Poster Image", "rab"),
                "param_name" => "video_poster_image",
                "description" => "This image will bw shown while the video is loading.",
				"admin_label" => false,
                "value" => "",
                 "dependency" => Array(
                    'element' => 'video_display_type', 
                    'value' => array('local_video','local_video_popup'),
                )
            ),
            array(
                "type" => "attach_image",
                "class" => "",
                "heading" => esc_html__("Video Cover Image", "rab"),
                "param_name" => "video_background_image",
                "description" => "Cover image of video shortcode(Optional).",
                "value" => "",
                "dependency" => Array(
                    'element' => 'video_display_type', 
                    'value' => array('local_video_popup','embeded_video_youtube_popup','embeded_video_vimeo_popup'),
                )
            ), 
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Self Hosted Video (.webm video type)", "rab"),
				"param_name" => "video_webm",
				"value" => "",
				"admin_label" => false,
				"description" => "Please provide a URL to all of the video types",
                "dependency" => Array(
                    'element' => 'video_display_type', 
                    'value' => array('local_video','local_video_popup'),
                )
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Self Hosted Video (.mp4 video type)", "rab"),
				"param_name" => "video_mp4",
				"value" => "",
				"admin_label" => false,
				"description" => esc_html__("Please provide a URL to all of the video types", "rab"),
                "dependency" => Array(
                    'element' => 'video_display_type', 
                    'value' => array('local_video','local_video_popup'),
                )
			),
            array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__("Self Hosted Video (.ogv video type)", "rab"),
				"param_name" => "video_ogv",
				"value" => "",
				"admin_label" => false,
				"description" => esc_html__("Please provide a URL to all of the video types", "rab"),
                "dependency" => Array(
                    'element' => 'video_display_type', 
                    'value' => array('local_video','local_video_popup'),
                )
			),
            array(
				"type" => "dropdown",
				"admin_label" => true,
				"class" => "",
				"heading" => esc_html__("Video Play Button Color", "rab"),
				"param_name" => "video_play_button_color",
				"description" => esc_html__("Select play button style.", "rab") , 
                "value" => array(
                    "Light" => "light",
                    "Dark" => "dark",
				),
                 "dependency" => Array(
                    'element' => 'video_display_type', 
                    'value' => array('local_video','local_video_popup','embeded_video_youtube_popup', 'embeded_video_vimeo_popup'),
                )
            ),
            array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("Vimoe Video URL", "rab"),
				"param_name" => "video_vimeo_id",
				"value" => "",
				"admin_label" => false,
				"description" => "Enter vimeo video URL",
                "dependency" => Array(
                    'element' => 'video_display_type', 
                    'value' => array('embeded_video_vimeo', 'embeded_video_vimeo_popup'),
                )
            ),
            array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html__("YouTube Video URL", "rab"),
				"param_name" => "video_youtube_id",
				"value" => "",
				"admin_label" => false,
				"description" => "Enter YouTube video URL",
                "dependency" => Array(
                    'element' => 'video_display_type', 
                    'value' => array('embeded_video_youtube', 'embeded_video_youtube_popup'),
                )
            ),
            array(
	            "type" => "dropdown",
	            "admin_label" => true,
	            "class" => "",
	            "heading" => esc_html__("Animation", "rab"),
	            "param_name" => "animation",
	            "description" => esc_html__("Select animation type", "rab") ,
		        "value" => $animations,
                "group" => esc_html__('Animation','rab')
            ),
            array(
	            "type" => "textfield",
	            "admin_label" => true,
	            "class" => "",
	            "heading" => esc_html__("Animation Delay", "rab"),
	            "param_name" => "animation_delay",
	            "value" => "",
                "description" => esc_html__("Enter animation delay (in milliseconds), for example if you want 3 seconds delay, you should enter 3000 .", "rab") ,
                "group" => esc_html__('Animation','rab')
            ),
		  )
		)
    );

/*-----------------------------------------------------------------------------------*/
/* Image Box
/*-----------------------------------------------------------------------------------*/

vc_map( 
	array(
		"name" => "Image box",
		"base" => "imagebox",
		"category" => 'RAB Elements',
		"icon" => "icon-wpb-imagebox",
        "weight" => 9,
		"params" => array(
				array(
					"type" => "attach_image",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Image URL", "rab"),
					"param_name" => "image_url",
					"value" => "",
					"description" => esc_html__("URL of the image", "rab")
				),
               array(
					"type" => "dropdown",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Hover", "rab"),
					"param_name" => "image_hover",
				    "value" => array(
                       "Enable" => "enable",
		               "Disable" => "disable"
	                ),
					"description" => esc_html__("You can Enable Or Disable ImageBox hover", "rab") ,   
				),
                array(
					"type" => "dropdown",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Hover shadow", "rab"),
					"param_name" => "image_hover_shadow",
				    "value" => array(
                        "Disable" => "disable",
                        "Enable" => "enable",
	                ),
					"description" => esc_html__("You can Enable Or Disable ImageBox hover shadow", "rab") ,   
				),

                array(
					"type" => "textarea",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Title", "rab"),
					"param_name" => "title",
					"value" => "",
					"description" => esc_html__("Enter title text", "rab") ,   
				),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "admin_label" => true,
                    "heading" => esc_html__("Title Font Size", "rab"), 
                    "param_name" => "image_title_size",
                    "description" => esc_html__("Select the font size of the title.", "rab") ,
                    "value" => $fontsize,
                ),
               array(
					"type" => "colorpicker",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Title color ", "rab"),
					"param_name" => "title_color",
					"value" => "",
					"description" => esc_html__("Select optional title color.", "rab") ,  
				),
                array(
					"type" => "textfield",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Subtitle", "rab"),
					"param_name" => "subtitle",
					"value" => "",
					"description" => esc_html__("Enter Subtitle text", "rab") ,   
				),
               array(
					"type" => "colorpicker",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Subtitle color ", "rab"),
					"param_name" => "subtitle_color",
					"value" => "",
					"description" => esc_html__("Select optional Subtitle color.", "rab") ,  
				),
                array(
					"type" => "textarea",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Text", "rab"),
					"param_name" => "vccontent",
					"value" => "",
					"description" => esc_html__("Enter your text content here", "rab") ,   
				),
                array(
					"type" => "dropdown",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Content Font Size", "rab"),
					"param_name" => "content_fontsize",
					"description" => esc_html__("Select content font size.", "rab") , 
					 "value" => $contentfontsize,
				),
               array(
					"type" => "colorpicker",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Text Color", "rab"),
					"param_name" => "image_text_color",
					"value" => "",
					"description" => esc_html__("Select optional text color.", "rab") ,  
				),
                array(
					"type" => "dropdown",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Text Align", "rab"), 
					"param_name" => "image_text_align",
					"description" => esc_html__("Select text align", "rab") ,
					"value" => array(
						"Left" => "left",
						"Right" => "right",
                        "Center" => "center",
					),
				),
                array(
					"type" => "colorpicker",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Background Color", "rab"),
					"param_name" => "image_text_background_color",
					"value" => "",
					"description" => esc_html__("Select optional background color ", "rab") ,  
				),
                array(
					"type" => "dropdown",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("content border", "rab"),
					"param_name" => "imagebox_content_border",
				    "value" => array(
                       "Enable" => "enable",
		               "Disable" => "disable"
	                ),
					"description" => esc_html__("You can Enable Or Disable ImageBox content border", "rab"),
                ),
               array(
					"type" => "colorpicker",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Border Color", "rab"),
					"param_name" => "image_text_border_color",
					"value" => "",
					"description" => esc_html__("Select optional border color ", "rab") ,  
                    "dependency" => Array(
                        'element' => 'imagebox_content_border', 
                        'value' => 'enable'
                    )
				),
                array(
					"type" => "textfield",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Link", "rab"),
					"param_name" => "url",
					"value" => "",
					"description" => esc_html__("Optional URL to another web page.", "rab") ,   
				),
                 array(
					"type" => "dropdown",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Link Target", "rab"), 
					"param_name" => "target",
					"description" => esc_html__("Open link in the same page or a new browser page.", "rab") ,
					"value" => array(
						"Open in same window" => "_self",
						"Open in new window" => "_blank"   
					),
				),
                array(
	                "type" => "dropdown",
	                "admin_label" => true,
	                "class" => "",
	                "heading" => esc_html__("Animation", "rab"),
	                "param_name" => "image_animation",
	                "description" => esc_html__("Select animation type", "rab") ,
		            "value" => $animations,
                    "group" => esc_html__('Animation','rab')
                ),
                array(
	                "type" => "textfield",
	                "admin_label" => true,
	                "class" => "",
	                "heading" => esc_html__("Animation Delay", "rab"),
	                "param_name" => "image_animation_delay",
	                "value" => "",
                    "description" => esc_html__("Enter animation delay (in milliseconds), for example if you want 3 seconds delay, you should enter 3000 .", "rab") ,
                    "group" => esc_html__('Animation','rab')
                ),
			)
		)
    );

/*-----------------------------------------------------------------------------------*/
/* banner 
/*-----------------------------------------------------------------------------------*/

vc_map( 
    array(
        "name" => "Banner",
        "base" => "banner",
        "category" => 'RAB Elements',
        "icon" => "icon-wpb-banner",
        "weight" => 9,
        "params" => array(
                array(
                    "type" => "attach_image",
                    "admin_label" => false,
                    "class" => "",
                    "heading" => esc_html__("Image URL", "rab"),
                    "param_name" => "image_url",
                    "value" => "",
                    "description" => esc_html__("URL of the image", "rab")
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "admin_label" => false,
                    "heading" => esc_html__("Style", "rab"), 
                    "param_name" => "style",
                    "description" => esc_html__("Select style of hover", "rab") ,
                    "value" => array("Large subtitle, small title" => "style1", "Large title, small subtitle"=>"style2"),
                ),  
                array(
                    "type" => "textarea",
                    "admin_label" => true,
                    "class" => "",
                    "heading" => esc_html__("Title", "rab"),
                    "param_name" => "title",
                    "value" => "",
                    "description" => esc_html__("Enter title text", "rab") ,   
                ),
                array(
                    "type" => "dropdown",
                    "class" => "",
                    "admin_label" => false,
                    "heading" => esc_html__("Title Font Size", "rab"), 
                    "param_name" => "title_size",
                    "description" => esc_html__("Select the font size of the title.", "rab") ,
                    "value" => $fontsize,
                ),
               array(
                    "type" => "colorpicker",
                    "admin_label" => false,
                    "class" => "",
                    "heading" => esc_html__("Title color ", "rab"),
                    "param_name" => "title_color",
                    "value" => "",
                    "description" => esc_html__("Select optional title color.", "rab") ,  
                ),
                array(
                    "type" => "vc_multiselect",
                    "class" => "",
                    "admin_label" => true,
                    "heading" => esc_html__("Line", "rab"), 
                    "param_name" => "line",
                    "options" => array("disable" => "Disable line"),
                    "description" => esc_html__("Disable line around the product box", "rab"),
                     "value" => "",
                ),     
                array(
                    "type" => "colorpicker",
                    "class" => "",
                    "admin_label" => false,
                    "heading" => esc_html__("Line's Color", "rab"),
                    "param_name" => "title_border_color",
                    "value" => "",
                    "description" => esc_html__("Select optional border color.", "rab") ,
                ),
                array(
                    "type" => "textfield",
                    "admin_label" => false,
                    "class" => "",
                    "heading" => esc_html__("Subtitle", "rab"),
                    "param_name" => "subtitle",
                    "value" => "",
                    "description" => esc_html__("Enter Subtitle text", "rab") ,   
                ),
               array(
                    "type" => "colorpicker",
                    "admin_label" => false,
                    "class" => "",
                    "heading" => esc_html__("Subtitle color ", "rab"),
                    "param_name" => "subtitle_color",
                    "value" => "",
                    "description" => esc_html__("Select optional Subtitle color.", "rab") ,  
                ),
                array(
                    "type" => "dropdown",
                    "admin_label" => true,
                    "class" => "",
                    "heading" => esc_html__("Hover", "rab"),
                    "param_name" => "hover",
                    "value" => array(
                       "Enable" => "enable",
                       "Disable" => "disable"
                    ),
                    "description" => esc_html__("You can Enable Or Disable hover", "rab") ,   
                ),
   
                array(
                    "type" => "vc_link",
                    "admin_label" => false,
                    "class" => "",
                    "heading" => esc_html__("Link", "rab"),
                    "param_name" => "url",
                    "value" => "",
                    "description" => esc_html__("Optional URL to another web page.", "rab") ,   
                ),
                array(
                    "type" => "colorpicker",
                    "admin_label" => false,
                    "class" => "",
                    "heading" => esc_html__("Link color ", "rab"),
                    "param_name" => "link_color",
                    "value" => "",
                    "description" => esc_html__("Select optional link color.", "rab") ,  
                ),
                array(
                    "type" => "dropdown",
                    "admin_label" => false,
                    "class" => "",
                    "heading" => esc_html__("Animation", "rab"),
                    "param_name" => "animation",
                    "description" => esc_html__("Select animation type", "rab") ,
                    "value" => $animations,
                    "group" => esc_html__('Animation','rab')
                ),
                array(
                    "type" => "textfield",
                    "admin_label" => false,
                    "class" => "",
                    "heading" => esc_html__("Animation Delay", "rab"),
                    "param_name" => "delay",
                    "value" => "",
                    "description" => esc_html__("Enter animation delay (in milliseconds), for example if you want 3 seconds delay, you should enter 3000 .", "rab") ,
                    "group" => esc_html__('Animation','rab')
                ),
            )
        )
    );

/*-----------------------------------------------------------------------------------*/
/* text Box
/*-----------------------------------------------------------------------------------*/

vc_map( 
	array(
		"name" => "TextBox",
		"base" => "textbox",
		"category" => 'RAB Elements',
        'weight' => 8,
		"icon" => "icon-wpb-textbox",
		"params" => array(
                array(
					"type" => "textarea",
					"class" => "",
                    "admin_label" => true,
					"heading" => esc_html__("Title", "rab"),
					"param_name" => "title",
					"value" => "",
					"description" => esc_html__("Enter title text", "rab") ,   
				),
                array(
					"type" => "colorpicker",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Title Color", "rab"),
					"param_name" => "title_color",
					"value" => "",
					"description" => esc_html__("Select optional title color.", "rab") ,  
				),
                array(
					"type" => "dropdown",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Title Font Size", "rab"),
					"param_name" => "title_fontsize",
					"description" => esc_html__("Select the font size of the title.", "rab") , 
					 "value" => $fontsize,
				),
                array(
                    "type" => "dropdown",
                    "admin_label" => true,
                    "class" => "",
                    "heading" => esc_html__("Title Border", "rab"), 
                    "param_name" => "text_title_border",
                    "description" => esc_html__("Select title border", "rab") ,
                    "value" => array(
                        "None" => "none",
                        "Left Border" => "left_border",
                        "Right Border" => "right_border",
                        "Top Border" => "top_border",
                        "Bottom Border" => "bottom_border",
                    ),
                ),
                array(
					"type" => "colorpicker",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Title border/underline color ", "rab"),
					"param_name" => "text_border_underline_color",
					"value" => "",
					"description" => esc_html__("Select an optional color for title border or underline", "rab") , 
                    "dependency" => Array(
                        'element' => "text_title_border", 
                        'value' => array('right_border','left_border','top_border','bottom_border')
                    )
				),
                array(
					"type" => "dropdown",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Title Alignment", "rab"), 
					"param_name" => "text_under_align",
					"value" => array(
						"Left" => "left",
						"Right" => "right",
                        "Center" => "center",
					),
                    "dependency" => Array(
                        'element' => "text_title_border", 
                        'value' => array('top_border','bottom_border','none')
                    )
				),
                array(
					"type" => "textfield",
					"class" => "",
                    "admin_label" => true,
					"heading" => esc_html__("Subtitle", "rab"),
					"param_name" => "subtitle",
					"value" => "",
					"description" => esc_html__("Enter subtitle text", "rab") ,   
				),
                array(
					"type" => "colorpicker",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Subtitle Color", "rab"),
					"param_name" => "subtitle_color",
					"value" => "",
					"description" => esc_html__("Select optional subtitle color.", "rab") ,  
				),
                array(
					"type" => "textarea",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Content", "rab"),
					"param_name" => "text_content",
					"value" => "",
					"description" => esc_html__("Enter your text content here", "rab") ,   
				),
                array(
                    "type" => "dropdown",
                    "admin_label" => true,
                    "class" => "",
                    "heading" => esc_html__("Content Alignment", "rab"), 
                    "param_name" => "content_align",
                    "description" => esc_html__("Select content alignment", "rab") ,
                    "value" => array(
                        "Left" => "left",
                        "Right" => "right",
                        "Center" => "center",
                    ),
                ),
                array(
					"type" => "dropdown",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Content Font Size", "rab"),
					"param_name" => "content_fontsize",
					"description" => esc_html__("Select content font size.", "rab") , 
					 "value" => $contentfontsize,
				),
                array(
					"type" => "colorpicker",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Content Color", "rab"),
					"param_name" => "text_content_color",
					"value" => "",
					"description" => esc_html__("Select optional color for content.", "rab") ,  
				),
                array(
					"type" => "dropdown",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Animation", "rab"),
					"param_name" => "text_animation",
					"description" => esc_html__("Select animation type", "rab") ,
					 "value" => $animations,
                     "group" => esc_html__('Animation','rab'),
				),
                array(
					"type" => "textfield",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Animation Delay", "rab"),
					"param_name" => "text_animation_delay",
					"value" => "",
                    "description" => esc_html__("Enter animation delay (in milliseconds), for example if you want 3 seconds delay, you should enter 3000 .", "rab") ,
                    "group" => esc_html__('Animation','rab')
				),
                array(
					"type" => "textfield",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Link", "rab"),
					"param_name" => "url",
					"value" => "",
					"description" => esc_html__("Optional URL to another web page.", "rab") ,   
				),
                 array(
					"type" => "dropdown",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Link Target", "rab"), 
					"param_name" => "target",
					"description" => esc_html__("Open link in the same page or a new browser page.", "rab") ,
					"value" => array(
						"Open in same window" => "_self",
						"Open in new window" => "_blank"   
					),
				),
			)
		)
);

/*-----------------------------------------------------------------------------------*/
/* Custom Heading - Title 
/*-----------------------------------------------------------------------------------*/

vc_map( 
    array(
        "name" => "Title",
        "base" => "custom_title",
        "category" => 'RAB Elements',
        'weight' => 8,
        "icon" => "icon-wpb-custom-title",
        "params" => array(
                array(
                    "type" => "textarea",
                    "class" => "",
                    "admin_label" => true,
                    "heading" => esc_html__("Title", "rab"),
                    "param_name" => "title",
                    "value" => "",
                    "description" => esc_html__("Enter title text", "rab") ,   
                ),

               array(
                    "type" => "colorpicker",
                    "class" => "",
                    "heading" => esc_html__("Title color ", "rab"),
                    "param_name" => "title_color",
                    "value" => "",
                    "description" => esc_html__("Select optional title's color ", "rab") ,  
                ),

               array(
                    "type" => "textfield",
                    "class" => "",
                    "admin_label" => true,
                    "heading" => esc_html__("Custom class", "rab"),
                    "param_name" => "class",
                    "value" => "",
                    "description" => esc_html__("Enter custom class", "rab") ,   
                ),
            )
        )
);


/*-----------------------------------------------------------------------------------*/
/* Icon Box top - no border
/*-----------------------------------------------------------------------------------*/

vc_map( 
	array(
		"name" => "IconBox - Top",
		"base" => "iconbox_top_noborder",
		"category" => 'RAB Elements',
        'weight' => 8,
		"icon" => "icon-wpb-iconbox-noborder",
		"params" => array(
                array(
					"type" => "textfield",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Title", "rab"),
					"param_name" => "title",
					"value" => "",
					"description" => esc_html__("Enter title text", "rab") ,   
				),

                array(
					"type" => "textarea_html",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Content", "rab"),
					"param_name" => "content_text",
					"value" => "",
					"description" => esc_html__("Enter some content for your Iconbox.", "rab") ,   
				),

				array(
					"type" => "dropdown",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Icon type", "rab"), 
					"param_name" => "icon_type",
					"description" => esc_html__("Select type for your icon", "rab") ,
					"value" => array(
						'Choose one' => '',
                       "Custom Icon" => "custom",
		               "Default (Icofont)" => "default"
					),
					'group' => 'Icon'
				),
 
                array(
					"type" => "vc_icons",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Icon", "rab"),
					"param_name" => "icon",
					"value" => "",
					"description" => esc_html__("Select an icon to be located at the top of the box", "rab"),
					'dependency' => array( 'element' => 'icon_type', 'value' => 'default' ),
					'group' => 'Icon'
				),

				array(
					"type" => "textfield",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Custom icon", "rab"),
					"param_name" => "custom_icon",
					"value" => "",
					"description" => esc_html__("Enter icon class", "rab") ,
					'dependency' => array( 'element' => 'icon_type', 'value' => 'custom'),
					'group' => 'Icon'
				),

               array(
					"type" => "colorpicker",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Icon Color", "rab"),
					"param_name" => "icon_color",
					"value" => "",
					"description" => esc_html__("Select optional icon color.", "rab"), 
					'group' => 'Icon' 
				),
			)
		)
);


/*-----------------------------------------------------------------------------------*/
/* Icon Box left 
/*-----------------------------------------------------------------------------------*/

vc_map( 
	array(
		"name" => "IconBox",
		"base" => "iconbox_left",
		"category" => 'RAB Elements',
        'weight' => 8,
		"icon" => "icon-wpb-iconbox-left",
		"params" => array(
                array(
					"type" => "textfield",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Title", "rab"),
					"param_name" => "title",
					"value" => "",
					"description" => esc_html__("Enter title text", "rab") ,   
				),
               array(
					"type" => "colorpicker",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Title Color ", "rab"),
					"param_name" => "title_color",
					"value" => "",
					"description" => esc_html__("Select optional title color.", "rab") ,  
				),
                array(
					"type" => "textarea",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Content", "rab"),
					"param_name" => "content_text",
					"value" => "",
					"description" => esc_html__("Enter some content for your IconBox", "rab") ,   
				),
               array(
					"type" => "colorpicker",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Content Color", "rab"),
					"param_name" => "content_color",
					"value" => "",
					"description" => esc_html__("Select optional content color", "rab") ,  
				),
                array(
					"type" => "vc_icons",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Icon", "rab"),
					"param_name" => "icon",
					"value" => "",
					"description" => esc_html__("Select an icon to be located at the top of the box.", "rab") ,   
				),
               array(
					"type" => "colorpicker",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Icon Color", "rab"),
					"param_name" => "icon_color",
					"value" => "",
					"description" => esc_html__("Select optional icon color.", "rab") ,  
				),
                 array(
					"type" => "dropdown",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Animation", "rab"),
					"param_name" => "icon_animation",
					"description" => esc_html__("Select an animation for Icon box.", "rab") , 
					 "value" => $animations,
                     "group" => esc_html__('Animation','rab')
				),
                array(
					"type" => "textfield",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Animation Delay", "rab"),
					"param_name" => "icon_animation_delay",
					"value" => "",
                    "description" => esc_html__("Enter animation delay (in milliseconds), for example if you want 3 seconds delay, you should enter 3000 .", "rab") ,
                    "group" => esc_html__('Animation','rab')
				),
               array(
                    "type" => "vc_link",
                    "admin_label" => true,
                    "class" => "",
                    "heading" => esc_html__("Link", "rab"),
                    "param_name" => "url",
                    "value" => "",
                    "description" => esc_html__("Optional URL to another web page.", "rab") ,   
                ),
			)
		)
);

/*-----------------------------------------------------------------------------------*/
/* Social icon 
/*-----------------------------------------------------------------------------------*/

vc_map( 
	array(
		"name" => "Social Icon ",
		"base" => "social_icon",
		"category" => 'RAB Elements',
        'weight' => 8,
		"icon" => "icon-wpb-social",

		"params" => array(
                array(
					"type" => "dropdown",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Social Network Type", "rab"),
					"param_name" => "sociallink_type",
					"description" => esc_html__("Select social link type.", "rab") , 
					 "value" =>  $socialIcon,
				),
                array(
					"type" => "textfield",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Social Network URL", "rab"),
					"param_name" => "sociallink_url",
					"value" => "",
					"description" => esc_html__("Copy and paste social network URL.", "rab") ,   
				),

				array(
					"type" => "attach_image",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Image URL", "rab"),
					"param_name" => "sociallink_image",
					"description" => esc_html__("Choose an image to be used as social icon's logo. ( best size : 20px * 25px ) ", "rab") , 
					"value" => "",
					"dependency" => Array(
                    'element' => "sociallink_type", 
                    'value' =>"custom"
                   )
				),
                array(
					"type" => "colorpicker",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Social color", "rab"),
					"param_name" => "sociallink_color",
					"description" => esc_html__("Choose a color to be used as social icon's accent color.", "rab") , 
					"value" => "",
					"dependency" => Array(
                    'element' => "sociallink_type", 
                    'value' =>"custom"
                   )
				), 				
			)
		)
);

/*-----------------------------------------------------------------------------------*/
/*  Team member
/*-----------------------------------------------------------------------------------*/

vc_map( 
	array(
		"name" => "Team Member",
		"base" => "team_member",
		"category" => 'RAB Elements',
        'weight' => 9,
		"icon" => "icon-wpb-teammemmber",

		"params" => array(
                array(
					"type" => "textfield",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Name", "rab"),
					"param_name" => "name",
					"value" => "",
					"description" => esc_html__("Name of the team member", "rab") ,   
				),
               array(
					"type" => "textfield",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Job Title", "rab"),
					"param_name" => "job_title",
					"value" => "",
					"description" => esc_html__("Team member's job title", "rab") ,  
				),

               array(
					"type" => "attach_image",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Image", "rab"),
					"param_name" => "image",
					"value" => "",
					"description" => esc_html__("Optional URL of member's image", "rab")
				),

                array(
                    "type" => "vc_link",
                    "holder" => "",
                    "class" => "",
                    "heading" => esc_html__("Link", "rab"),
                    "param_name" => "url",
                    "value" => "",
                    "description" => esc_html__("Optional URL to another web page", "rab") ,   
                ),

               array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__("Facebook URL", "rab"),
					"param_name" => "facebook_url",
					"value" => "",
                    "group" => "social icons",
					"description" => esc_html__("Facebook URL", "rab") ,   
				),
               	array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__("Facebook link's target", "rab"), 
					"param_name" => "team_icon_target1",
                    "group" => "social icons",
					"description" => esc_html__("Open the link in the same tab or a blank browser tab", "rab") ,
					"value" => array(
						"Open in same window" => "_self",
						"Open in new window" => "_blank"   
					),
			   	),

                array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__("Twitter URL", "rab"),
					"param_name" => "twitter_url",
					"value" => "",
                    "group" => "social icons",
					"description" => esc_html__("Twitter URL of the member", "rab") ,   
				),

               	array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__("Twitter link's target", "rab"), 
					"param_name" => "team_icon_target2",
                    "group" => "social icons",
					"description" => esc_html__("Open the link in the same tab or a blank browser tab", "rab") ,
					"value" => array(
						"Open in same window" => "_self",
						"Open in new window" => "_blank"   
					),
				),

                array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__("Linkedin URL", "rab"),
					"param_name" => "linkedin_url",
                    "group" => "social icons",
					"value" => "",
					"description" => esc_html__("Optional URL to another web page", "rab") ,   
				),
               array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__("Linkedin link's target", "rab"), 
					"param_name" => "team_icon_target3",
                    "group" => "social icons",
					"description" => esc_html__("Open the link in the same tab or a blank browser tab", "rab") ,
					"value" => array(
						"Open in same window" => "_self",
						"Open in new window" => "_blank"   
					),
				),

               array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__("Instagram URL", "rab"),
					"param_name" => "instagram_url",
                    "group" => "social icons",
					"value" => "",
					"description" => esc_html__("Linkedin URL of the member", "rab") ,   
				),
               array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__("Instagram link's target", "rab"), 
					"param_name" => "team_icon_target4",
                    "group" => "social icons",
					"description" => esc_html__("Open the link in the same tab or a blank browser tab", "rab") ,
					"value" => array(
						"Open in same window" => "_self",
						"Open in new window" => "_blank"   
					),
				),
                array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__("Choose an icon for team member icon 5", "rab"),
					"param_name" => "custom_icon",
                    "group" => "social icons",
					"value" => "",
					"description" => esc_html__("Please visit fontawesome site for more links", "rab") ,
				),
               array(
					"type" => "textfield",
					"class" => "",
					"heading" => esc_html__("Custom Link", "rab"),
					"param_name" => "custom_url",
                    "group" => "social icons",
					"value" => "",
					"description" => esc_html__("Optional URL to another web page", "rab") ,   
				),
               array(
					"type" => "dropdown",
					"class" => "",
					"heading" => esc_html__("Custom link's target", "rab"), 
					"param_name" => "team_icon_target5",
                    "group" => "social icons",
					"description" => esc_html__("Open the link in the same tab or a blank browser tab", "rab") ,
					"value" => array(
						"Open in same window" => "_self",
						"Open in new window" => "_blank"   
					),
				),  
			)
		)
);

/*-----------------------------------------------------------------------------------*/
/*  Button
/*-----------------------------------------------------------------------------------*/

vc_map( 
	array(
		"name" => "Button",
		"base" => "button",
		"category" => 'RAB Elements',
        'weight' => 9,
		"icon" => "icon-wpb-button",
		"params" => array(
                array(
					"type" => "textfield",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Text", "rab"),
					"param_name" => "text",
					"value" => "",
					"description" => esc_html__("Button text", "rab") ,   
				),
                array(
                    "type" => "vc_link",
                    "holder" => "",
                    "class" => "",
                    "heading" => esc_html__("Link", "rab"),
                    "param_name" => "url",
                    "value" => "",
                    "description" => esc_html__("Optional URL to another web page", "rab") ,   
                ),

                array(
                    "type" => "dropdown",
                    "admin_label" => true,
                    "class" => "",
                    "heading" => esc_html__("Alignment", "rab"), 
                    "param_name" => "alignment",
                    "description" => esc_html__("Choose one of available button alignments.", "rab") ,
                    "value" => array(
                        "Left" => "left",
                        "Center" => "center",
                        "Right" => "right"
                    ),
                ),
                array(
					"type" => "colorpicker",
					"admin_label" => true,
					"class" => "",
					"heading" => esc_html__("Text & Icon Color", "rab"),
					"param_name" => "button_text_color",
					"value" => "",
					"description" => esc_html__("Enter optional color for button's text and icon.", "rab") ,  
				),
                array(
                    "type" => "colorpicker",
                    "admin_label" => true,
                    "class" => "",
                    "heading" => esc_html__("Text & Icon On-hover Color", "rab"),
                    "param_name" => "button_text_hover_color",
                    "value" => "",
                    "description" => esc_html__("The color of button's text and icon on hover mode.", "rab") ,  
                ),

                array(
                    "type" => "vc_icons",
                    "heading" => esc_html__("Select Icon", "rab"),
                    "param_name" => "button_icon",
                    'group'		=> esc_html__( "Icon",  "rab"),
                    "description" => esc_html__("Select an icon to be shown in buttons", "rab") ,   
                ),
			)
		)
);

/*-----------------------------------------------------------------------------------*/
/* Tabs, Tour, accordion
/*-----------------------------------------------------------------------------------*/

$tta_setting = array (
  "weight" => 9,
);
vc_map_update('vc_tta_tour', $tta_setting);
vc_map_update('vc_tta_tabs', $tta_setting);
vc_map_update('vc_tta_accordion', $tta_setting);


/*-----------------------------------------------------------------------------------*/
/* VC masonry grid
/*-----------------------------------------------------------------------------------*/
// remove filter
vc_remove_param( 'vc_masonry_grid', 'show_filter' );
vc_remove_param( 'vc_masonry_grid', 'filter_source' );
vc_remove_param( 'vc_masonry_grid', 'exclude_filter' );
vc_remove_param( 'vc_masonry_grid', 'filter_style' );
vc_remove_param( 'vc_masonry_grid', 'filter_align' );
vc_remove_param( 'vc_masonry_grid', 'filter_color' );
vc_remove_param( 'vc_masonry_grid', 'filter_size' );

// remove load more button style
vc_remove_param( 'vc_masonry_grid', 'button_color' );
vc_remove_param( 'vc_masonry_grid', 'button_size' );
vc_remove_param( 'vc_masonry_grid', 'button_style' );

// remove pagination options
vc_remove_param( 'vc_masonry_grid', 'arrows_design' );
vc_remove_param( 'vc_masonry_grid', 'arrows_color' );
vc_remove_param( 'vc_masonry_grid', 'arrows_position' );
vc_remove_param( 'vc_masonry_grid', 'paging_design' );
vc_remove_param( 'vc_masonry_grid', 'paging_color' );


/*-----------------------------------------------------------------------------------*/
/* VC basic grid
/*-----------------------------------------------------------------------------------*/
// remove filter
vc_remove_param( 'vc_basic_grid', 'show_filter' );
vc_remove_param( 'vc_basic_grid', 'filter_source' );
vc_remove_param( 'vc_basic_grid', 'exclude_filter' );
vc_remove_param( 'vc_basic_grid', 'filter_style' );
vc_remove_param( 'vc_basic_grid', 'filter_align' );
vc_remove_param( 'vc_basic_grid', 'filter_color' );
vc_remove_param( 'vc_basic_grid', 'filter_size' );

// remove load more button style
vc_remove_param( 'vc_basic_grid', 'button_color' );
vc_remove_param( 'vc_basic_grid', 'button_size' );
vc_remove_param( 'vc_basic_grid', 'button_style' );

// remove pagination options
vc_remove_param( 'vc_basic_grid', 'arrows_design' );
vc_remove_param( 'vc_basic_grid', 'arrows_color' );
vc_remove_param( 'vc_basic_grid', 'arrows_position' );
vc_remove_param( 'vc_basic_grid', 'paging_design' );
vc_remove_param( 'vc_basic_grid', 'paging_color' );