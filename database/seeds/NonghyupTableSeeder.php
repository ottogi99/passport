<?php

use Illuminate\Database\Seeder;

class NonghyupTableSeeder extends Seeder
{
    /**
     * Run the databcnase seeds.
     *
     * @return void
     */
    // public function run()
    // {
    //     factory(App\Nonghyup::clcnacnss, 30)->create();
    // }

    // private $nonghyups = [
    //     // // 천안시(7)
    //     [ 'code'=>'nh485014', 'sigun'=>'cnca', 'active'=>1, 'seq'=>11, 'name'=>'천안농협' ],
    //     [ 'code'=>'nh485047', 'sigun'=>'cnca', 'active'=>1, 'seq'=>12, 'name'=>'동천안농협' ],
    //     [ 'code'=>'nh485058', 'sigun'=>'cnca', 'active'=>1, 'seq'=>13, 'name'=>'성거농협' ],
    //     [ 'code'=>'nh485069', 'sigun'=>'cnca', 'active'=>1, 'seq'=>14, 'name'=>'성환농협' ],
    //     [ 'code'=>'nh485070', 'sigun'=>'cnca', 'active'=>1, 'seq'=>15, 'name'=>'입장농협' ],
    //     [ 'code'=>'nh485081', 'sigun'=>'cnca', 'active'=>1, 'seq'=>16, 'name'=>'직산농협' ],
    //     [ 'code'=>'nh485092', 'sigun'=>'cnca', 'active'=>1, 'seq'=>17, 'name'=>'아우내농협' ],
    //     // // 공주시(11)
    //     [ 'code'=>'nh457017', 'sigun'=>'cngj', 'active'=>1, 'seq'=>11, 'name'=>'계룡농협' ],
    //     [ 'code'=>'nh457039', 'sigun'=>'cngj', 'active'=>1, 'seq'=>12, 'name'=>'탄천농협' ],
    //     [ 'code'=>'nh457040', 'sigun'=>'cngj', 'active'=>1, 'seq'=>13, 'name'=>'유구농협' ],
    //     [ 'code'=>'nh457051', 'sigun'=>'cngj', 'active'=>1, 'seq'=>14, 'name'=>'정안농협' ],
    //     [ 'code'=>'nh457062', 'sigun'=>'cngj', 'active'=>1, 'seq'=>15, 'name'=>'의당농협' ],
    //     [ 'code'=>'nh457073', 'sigun'=>'cngj', 'active'=>1, 'seq'=>16, 'name'=>'신풍농협' ],
    //     [ 'code'=>'nh457084', 'sigun'=>'cngj', 'active'=>1, 'seq'=>17, 'name'=>'반포농협' ],
    //     [ 'code'=>'nh457095', 'sigun'=>'cngj', 'active'=>1, 'seq'=>18, 'name'=>'사곡농협' ],
    //     [ 'code'=>'nh457109', 'sigun'=>'cngj', 'active'=>1, 'seq'=>19, 'name'=>'우성농협' ],
    //     [ 'code'=>'nh457110', 'sigun'=>'cngj', 'active'=>1, 'seq'=>20, 'name'=>'이인농협' ],
    //     [ 'code'=>'nh457121', 'sigun'=>'cngj', 'active'=>1, 'seq'=>21, 'name'=>'공주농협' ],
    //     // // 보령시(7)
    //     [ 'code'=>'nh467011', 'sigun'=>'cnbr', 'active'=>1, 'seq'=>11, 'name'=>'대천농협' ],
    //     [ 'code'=>'nh467043', 'sigun'=>'cnbr', 'active'=>1, 'seq'=>12, 'name'=>'남포농협' ],
    //     [ 'code'=>'nh467054', 'sigun'=>'cnbr', 'active'=>1, 'seq'=>13, 'name'=>'오천농협' ],
    //     [ 'code'=>'nh467065', 'sigun'=>'cnbr', 'active'=>1, 'seq'=>14, 'name'=>'청소농협' ],
    //     [ 'code'=>'nh467076', 'sigun'=>'cnbr', 'active'=>1, 'seq'=>15, 'name'=>'천북농협' ],
    //     [ 'code'=>'nh467087', 'sigun'=>'cnbr', 'active'=>1, 'seq'=>16, 'name'=>'웅천농협' ],
    //     [ 'code'=>'nh467098', 'sigun'=>'cnbr', 'active'=>1, 'seq'=>17, 'name'=>'주산농협' ],
    //     // // 아산시(10)
    //     [ 'code'=>'nh483012', 'sigun'=>'cnas', 'active'=>1, 'seq'=>11, 'name'=>'온양농협' ],
    //     [ 'code'=>'nh483023', 'sigun'=>'cnas', 'active'=>1, 'seq'=>12, 'name'=>'송악농협' ],
    //     [ 'code'=>'nh483034', 'sigun'=>'cnas', 'active'=>1, 'seq'=>13, 'name'=>'배방농협' ],
    //     [ 'code'=>'nh483045', 'sigun'=>'cnas', 'active'=>1, 'seq'=>14, 'name'=>'탕정농협' ],
    //     [ 'code'=>'nh483056', 'sigun'=>'cnas', 'active'=>1, 'seq'=>15, 'name'=>'음봉농협' ],
    //     [ 'code'=>'nh483067', 'sigun'=>'cnas', 'active'=>1, 'seq'=>16, 'name'=>'둔포농협' ],
    //     [ 'code'=>'nh483078', 'sigun'=>'cnas', 'active'=>1, 'seq'=>17, 'name'=>'영인농협' ],
    //     [ 'code'=>'nh483089', 'sigun'=>'cnas', 'active'=>1, 'seq'=>18, 'name'=>'인주농협' ],
    //     [ 'code'=>'nh483115', 'sigun'=>'cnas', 'active'=>1, 'seq'=>19, 'name'=>'선도농협' ],
    //     [ 'code'=>'nh483126', 'sigun'=>'cnas', 'active'=>1, 'seq'=>20, 'name'=>'염치농협' ],
    //     // // 서산시(9)
    //     [ 'code'=>'nh477013', 'sigun'=>'cnss', 'active'=>1, 'seq'=>11, 'name'=>'서산농협' ],
    //     [ 'code'=>'nh477035', 'sigun'=>'cnss', 'active'=>1, 'seq'=>12, 'name'=>'부석농협' ],
    //     [ 'code'=>'nh477057', 'sigun'=>'cnss', 'active'=>1, 'seq'=>13, 'name'=>'지곡농협' ],
    //     [ 'code'=>'nh477068', 'sigun'=>'cnss', 'active'=>1, 'seq'=>14, 'name'=>'대산농협' ],
    //     [ 'code'=>'nh477079', 'sigun'=>'cnss', 'active'=>1, 'seq'=>15, 'name'=>'성연농협' ],
    //     [ 'code'=>'nh477080', 'sigun'=>'cnss', 'active'=>1, 'seq'=>16, 'name'=>'음암농협' ],
    //     [ 'code'=>'nh477091', 'sigun'=>'cnss', 'active'=>1, 'seq'=>17, 'name'=>'운산농협' ],
    //     [ 'code'=>'nh477105', 'sigun'=>'cnss', 'active'=>1, 'seq'=>18, 'name'=>'해미농협' ],
    //     [ 'code'=>'nh477116', 'sigun'=>'cnss', 'active'=>1, 'seq'=>19, 'name'=>'고북농협' ],
    //     // // 논산시(10)
    //     [ 'code'=>'nh461014', 'sigun'=>'cnns', 'active'=>1, 'seq'=>11, 'name'=>'논산농협' ],
    //     [ 'code'=>'nh461025', 'sigun'=>'cnns', 'active'=>1, 'seq'=>12, 'name'=>'부적농협' ],
    //     [ 'code'=>'nh461036', 'sigun'=>'cnns', 'active'=>1, 'seq'=>13, 'name'=>'광석농협' ],
    //     [ 'code'=>'nh461047', 'sigun'=>'cnns', 'active'=>1, 'seq'=>14, 'name'=>'노성농협' ],
    //     [ 'code'=>'nh461058', 'sigun'=>'cnns', 'active'=>1, 'seq'=>15, 'name'=>'상월농협' ],
    //     [ 'code'=>'nh461070', 'sigun'=>'cnns', 'active'=>1, 'seq'=>16, 'name'=>'논산계룡농협' ],
    //     [ 'code'=>'nh461106', 'sigun'=>'cnns', 'active'=>1, 'seq'=>17, 'name'=>'양촌농협' ],
    //     [ 'code'=>'nh461117', 'sigun'=>'cnns', 'active'=>1, 'seq'=>18, 'name'=>'강경농협' ],
    //     [ 'code'=>'nh461128', 'sigun'=>'cnns', 'active'=>1, 'seq'=>19, 'name'=>'성동농협' ],
    //     [ 'code'=>'nh461140', 'sigun'=>'cnns', 'active'=>1, 'seq'=>20, 'name'=>'연무농협' ],
    //     // // 당진시(12)
    //     [ 'code'=>'nh481010', 'sigun'=>'cndj', 'active'=>1, 'seq'=>11, 'name'=>'당진농협' ],
    //     [ 'code'=>'nh481021', 'sigun'=>'cndj', 'active'=>1, 'seq'=>12, 'name'=>'고대농협' ],
    //     [ 'code'=>'nh481032', 'sigun'=>'cndj', 'active'=>1, 'seq'=>13, 'name'=>'석문농협' ],
    //     [ 'code'=>'nh481043', 'sigun'=>'cndj', 'active'=>1, 'seq'=>14, 'name'=>'대호지농협' ],
    //     [ 'code'=>'nh481054', 'sigun'=>'cndj', 'active'=>1, 'seq'=>15, 'name'=>'정미농협' ],
    //     [ 'code'=>'nh481065', 'sigun'=>'cndj', 'active'=>1, 'seq'=>16, 'name'=>'면천농협' ],
    //     [ 'code'=>'nh481076', 'sigun'=>'cndj', 'active'=>1, 'seq'=>17, 'name'=>'순성농협' ],
    //     [ 'code'=>'nh481087', 'sigun'=>'cndj', 'active'=>1, 'seq'=>18, 'name'=>'합덕농협' ],
    //     [ 'code'=>'nh481098', 'sigun'=>'cndj', 'active'=>1, 'seq'=>19, 'name'=>'우강농협' ],
    //     [ 'code'=>'nh481102', 'sigun'=>'cndj', 'active'=>1, 'seq'=>20, 'name'=>'신평농협' ],
    //     [ 'code'=>'nh481113', 'sigun'=>'cndj', 'active'=>1, 'seq'=>21, 'name'=>'송악농협' ],
    //     [ 'code'=>'nh481124', 'sigun'=>'cndj', 'active'=>1, 'seq'=>22, 'name'=>'송산농협' ],
    //     // // 금산군(4)
    //     [ 'code'=>'nh451011', 'sigun'=>'cngs', 'active'=>1, 'seq'=>11, 'name'=>'금산농협' ],
    //     [ 'code'=>'nh451055', 'sigun'=>'cngs', 'active'=>1, 'seq'=>12, 'name'=>'부리농협' ],
    //     [ 'code'=>'nh451088', 'sigun'=>'cngs', 'active'=>1, 'seq'=>13, 'name'=>'만인산농협' ],
    //     [ 'code'=>'nh451099', 'sigun'=>'cngs', 'active'=>1, 'seq'=>14, 'name'=>'진산농협' ],
    //     // // 부여군(7)
    //     [ 'code'=>'nh463016', 'sigun'=>'cnby', 'active'=>1, 'seq'=>11, 'name'=>'세도농협' ],
    //     [ 'code'=>'nh463038', 'sigun'=>'cnby', 'active'=>1, 'seq'=>12, 'name'=>'장암농협' ],
    //     [ 'code'=>'nh463094', 'sigun'=>'cnby', 'active'=>1, 'seq'=>13, 'name'=>'규암농협' ],
    //     [ 'code'=>'nh463119', 'sigun'=>'cnby', 'active'=>1, 'seq'=>14, 'name'=>'구룡농협' ],
    //     [ 'code'=>'nh463131', 'sigun'=>'cnby', 'active'=>1, 'seq'=>15, 'name'=>'서부여농협' ],
    //     [ 'code'=>'nh463142', 'sigun'=>'cnby', 'active'=>1, 'seq'=>16, 'name'=>'부여농협' ],
    //     [ 'code'=>'nh463164', 'sigun'=>'cnby', 'active'=>1, 'seq'=>17, 'name'=>'동부여농협' ],
    //     // // 서천군(6)
    //     [ 'code'=>'nh465018', 'sigun'=>'cnsc', 'active'=>1, 'seq'=>11, 'name'=>'서천농협' ],
    //     [ 'code'=>'nh465041', 'sigun'=>'cnsc', 'active'=>1, 'seq'=>12, 'name'=>'판교농협' ],
    //     [ 'code'=>'nh465063', 'sigun'=>'cnsc', 'active'=>1, 'seq'=>13, 'name'=>'서서천농협' ],
    //     [ 'code'=>'nh465085', 'sigun'=>'cnsc', 'active'=>1, 'seq'=>14, 'name'=>'한산농협' ],
    //     [ 'code'=>'nh465100', 'sigun'=>'cnsc', 'active'=>1, 'seq'=>15, 'name'=>'동서천농협' ],
    //     [ 'code'=>'nh465122', 'sigun'=>'cnsc', 'active'=>1, 'seq'=>16, 'name'=>'장항농협' ],
    //     // // 청양군(3)
    //     [ 'code'=>'nh471017', 'sigun'=>'cncy', 'active'=>1, 'seq'=>11, 'name'=>'청양농협' ],
    //     [ 'code'=>'nh471040', 'sigun'=>'cncy', 'active'=>1, 'seq'=>12, 'name'=>'정산농협' ],
    //     [ 'code'=>'nh471095', 'sigun'=>'cncy', 'active'=>1, 'seq'=>13, 'name'=>'화성농협' ],
    //     // // 홍성군(10)
    //     [ 'code'=>'nh473019', 'sigun'=>'cnhs', 'active'=>1, 'seq'=>11, 'name'=>'홍성농협' ],
    //     [ 'code'=>'nh473020', 'sigun'=>'cnhs', 'active'=>1, 'seq'=>12, 'name'=>'홍북농협' ],
    //     [ 'code'=>'nh473031', 'sigun'=>'cnhs', 'active'=>1, 'seq'=>13, 'name'=>'금마농협' ],
    //     [ 'code'=>'nh473042', 'sigun'=>'cnhs', 'active'=>1, 'seq'=>14, 'name'=>'홍동농협' ],
    //     [ 'code'=>'nh473053', 'sigun'=>'cnhs', 'active'=>1, 'seq'=>15, 'name'=>'구항농협' ],
    //     [ 'code'=>'nh473064', 'sigun'=>'cnhs', 'active'=>1, 'seq'=>16, 'name'=>'갈산농협' ],
    //     [ 'code'=>'nh473075', 'sigun'=>'cnhs', 'active'=>1, 'seq'=>17, 'name'=>'광천농협' ],
    //     [ 'code'=>'nh473086', 'sigun'=>'cnhs', 'active'=>1, 'seq'=>18, 'name'=>'장곡농협' ],
    //     [ 'code'=>'nh473101', 'sigun'=>'cnhs', 'active'=>1, 'seq'=>19, 'name'=>'결성농협' ],
    //     [ 'code'=>'nh473112', 'sigun'=>'cnhs', 'active'=>1, 'seq'=>20, 'name'=>'서부농협' ],
    //     // // 예산군(7)
    //     [ 'code'=>'nh475011', 'sigun'=>'cnys', 'active'=>1, 'seq'=>11, 'name'=>'신양농협' ],
    //     [ 'code'=>'nh475022', 'sigun'=>'cnys', 'active'=>1, 'seq'=>12, 'name'=>'예산중앙농협' ],
    //     [ 'code'=>'nh475066', 'sigun'=>'cnys', 'active'=>1, 'seq'=>13, 'name'=>'광시농협' ],
    //     [ 'code'=>'nh475077', 'sigun'=>'cnys', 'active'=>1, 'seq'=>14, 'name'=>'삽교농협' ],
    //     [ 'code'=>'nh475088', 'sigun'=>'cnys', 'active'=>1, 'seq'=>15, 'name'=>'덕산농협' ],
    //     [ 'code'=>'nh475103', 'sigun'=>'cnys', 'active'=>1, 'seq'=>16, 'name'=>'고덕농협' ],
    //     [ 'code'=>'nh475125', 'sigun'=>'cnys', 'active'=>1, 'seq'=>17, 'name'=>'예산농협' ],
    //     // // 태안군(6)
    //     [ 'code'=>'nh477127', 'sigun'=>'cnta', 'active'=>1, 'seq'=>11, 'name'=>'안면도농협' ],
    //     [ 'code'=>'nh477138', 'sigun'=>'cnta', 'active'=>1, 'seq'=>12, 'name'=>'남면농협' ],
    //     [ 'code'=>'nh477149', 'sigun'=>'cnta', 'active'=>1, 'seq'=>13, 'name'=>'태안농협' ],
    //     [ 'code'=>'nh477150', 'sigun'=>'cnta', 'active'=>1, 'seq'=>14, 'name'=>'근흥농협' ],
    //     [ 'code'=>'nh477161', 'sigun'=>'cnta', 'active'=>1, 'seq'=>15, 'name'=>'소원농협' ],
    //     [ 'code'=>'nh477172', 'sigun'=>'cnta', 'active'=>1, 'seq'=>16, 'name'=>'원북농협' ],
    //     // // 품농(5)
    //     [ 'code'=>'nh457811', 'sigun'=>'cngj', 'active'=>1, 'seq'=>99, 'name'=>'세종공주원예농협' ],
    //     [ 'code'=>'nh475815', 'sigun'=>'cnys', 'active'=>1, 'seq'=>99, 'name'=>'예산능금농협' ],
    //     [ 'code'=>'nh477817', 'sigun'=>'cnss', 'active'=>1, 'seq'=>99, 'name'=>'충서원예농협' ],
    //     [ 'code'=>'nh483816', 'sigun'=>'cnas', 'active'=>1, 'seq'=>99, 'name'=>'아산원예농협' ],
    //     [ 'code'=>'nh485818', 'sigun'=>'cnca', 'active'=>1, 'seq'=>99, 'name'=>'천안배농협' ],
    // ];

    private $nonghyups = [
        // // 천안시(7)
        [ 'code'=>'nh485014', 'sigun'=>'cnca', 'active'=>1, 'seq'=>1, 'name'=>'천안농협' ],
        [ 'code'=>'nh485047', 'sigun'=>'cnca', 'active'=>1, 'seq'=>2, 'name'=>'동천안농협' ],
        [ 'code'=>'nh485058', 'sigun'=>'cnca', 'active'=>1, 'seq'=>3, 'name'=>'성거농협' ],
        [ 'code'=>'nh485069', 'sigun'=>'cnca', 'active'=>1, 'seq'=>4, 'name'=>'성환농협' ],
        [ 'code'=>'nh485070', 'sigun'=>'cnca', 'active'=>1, 'seq'=>5, 'name'=>'입장농협' ],
        [ 'code'=>'nh485081', 'sigun'=>'cnca', 'active'=>1, 'seq'=>6, 'name'=>'직산농협' ],
        [ 'code'=>'nh485092', 'sigun'=>'cnca', 'active'=>1, 'seq'=>7, 'name'=>'아우내농협' ],
        // // 공주시(11)
        [ 'code'=>'nh457017', 'sigun'=>'cngj', 'active'=>1, 'seq'=>1, 'name'=>'계룡농협' ],
        [ 'code'=>'nh457039', 'sigun'=>'cngj', 'active'=>1, 'seq'=>2, 'name'=>'탄천농협' ],
        [ 'code'=>'nh457040', 'sigun'=>'cngj', 'active'=>1, 'seq'=>3, 'name'=>'유구농협' ],
        [ 'code'=>'nh457051', 'sigun'=>'cngj', 'active'=>1, 'seq'=>4, 'name'=>'정안농협' ],
        [ 'code'=>'nh457062', 'sigun'=>'cngj', 'active'=>1, 'seq'=>5, 'name'=>'의당농협' ],
        [ 'code'=>'nh457073', 'sigun'=>'cngj', 'active'=>1, 'seq'=>6, 'name'=>'신풍농협' ],
        [ 'code'=>'nh457084', 'sigun'=>'cngj', 'active'=>1, 'seq'=>7, 'name'=>'반포농협' ],
        [ 'code'=>'nh457095', 'sigun'=>'cngj', 'active'=>1, 'seq'=>8, 'name'=>'사곡농협' ],
        [ 'code'=>'nh457109', 'sigun'=>'cngj', 'active'=>1, 'seq'=>9, 'name'=>'우성농협' ],
        [ 'code'=>'nh457110', 'sigun'=>'cngj', 'active'=>1, 'seq'=>10, 'name'=>'이인농협' ],
        [ 'code'=>'nh457121', 'sigun'=>'cngj', 'active'=>1, 'seq'=>11, 'name'=>'공주농협' ],
        // // 보령시(7)
        [ 'code'=>'nh467011', 'sigun'=>'cnbr', 'active'=>1, 'seq'=>1, 'name'=>'대천농협' ],
        [ 'code'=>'nh467043', 'sigun'=>'cnbr', 'active'=>1, 'seq'=>2, 'name'=>'남포농협' ],
        [ 'code'=>'nh467054', 'sigun'=>'cnbr', 'active'=>1, 'seq'=>3, 'name'=>'오천농협' ],
        [ 'code'=>'nh467065', 'sigun'=>'cnbr', 'active'=>1, 'seq'=>4, 'name'=>'청소농협' ],
        [ 'code'=>'nh467076', 'sigun'=>'cnbr', 'active'=>1, 'seq'=>5, 'name'=>'천북농협' ],
        [ 'code'=>'nh467087', 'sigun'=>'cnbr', 'active'=>1, 'seq'=>6, 'name'=>'웅천농협' ],
        [ 'code'=>'nh467098', 'sigun'=>'cnbr', 'active'=>1, 'seq'=>7, 'name'=>'주산농협' ],
        // // 아산시(10)
        [ 'code'=>'nh483012', 'sigun'=>'cnas', 'active'=>1, 'seq'=>1, 'name'=>'온양농협' ],
        [ 'code'=>'nh483023', 'sigun'=>'cnas', 'active'=>1, 'seq'=>2, 'name'=>'송악농협' ],
        [ 'code'=>'nh483034', 'sigun'=>'cnas', 'active'=>1, 'seq'=>3, 'name'=>'배방농협' ],
        [ 'code'=>'nh483045', 'sigun'=>'cnas', 'active'=>1, 'seq'=>4, 'name'=>'탕정농협' ],
        [ 'code'=>'nh483056', 'sigun'=>'cnas', 'active'=>1, 'seq'=>5, 'name'=>'음봉농협' ],
        [ 'code'=>'nh483067', 'sigun'=>'cnas', 'active'=>1, 'seq'=>6, 'name'=>'둔포농협' ],
        [ 'code'=>'nh483078', 'sigun'=>'cnas', 'active'=>1, 'seq'=>7, 'name'=>'영인농협' ],
        [ 'code'=>'nh483089', 'sigun'=>'cnas', 'active'=>1, 'seq'=>8, 'name'=>'인주농협' ],
        [ 'code'=>'nh483115', 'sigun'=>'cnas', 'active'=>1, 'seq'=>9, 'name'=>'선도농협' ],
        [ 'code'=>'nh483126', 'sigun'=>'cnas', 'active'=>1, 'seq'=>10, 'name'=>'염치농협' ],
        // // 서산시(9)
        [ 'code'=>'nh477013', 'sigun'=>'cnss', 'active'=>1, 'seq'=>1, 'name'=>'서산농협' ],
        [ 'code'=>'nh477035', 'sigun'=>'cnss', 'active'=>1, 'seq'=>2, 'name'=>'부석농협' ],
        [ 'code'=>'nh477057', 'sigun'=>'cnss', 'active'=>1, 'seq'=>3, 'name'=>'지곡농협' ],
        [ 'code'=>'nh477068', 'sigun'=>'cnss', 'active'=>1, 'seq'=>4, 'name'=>'대산농협' ],
        [ 'code'=>'nh477079', 'sigun'=>'cnss', 'active'=>1, 'seq'=>5, 'name'=>'성연농협' ],
        [ 'code'=>'nh477080', 'sigun'=>'cnss', 'active'=>1, 'seq'=>6, 'name'=>'음암농협' ],
        [ 'code'=>'nh477091', 'sigun'=>'cnss', 'active'=>1, 'seq'=>7, 'name'=>'운산농협' ],
        [ 'code'=>'nh477105', 'sigun'=>'cnss', 'active'=>1, 'seq'=>8, 'name'=>'해미농협' ],
        [ 'code'=>'nh477116', 'sigun'=>'cnss', 'active'=>1, 'seq'=>9, 'name'=>'고북농협' ],
        // // 논산시(10)
        [ 'code'=>'nh461014', 'sigun'=>'cnns', 'active'=>1, 'seq'=>1, 'name'=>'논산농협' ],
        [ 'code'=>'nh461025', 'sigun'=>'cnns', 'active'=>1, 'seq'=>2, 'name'=>'부적농협' ],
        [ 'code'=>'nh461036', 'sigun'=>'cnns', 'active'=>1, 'seq'=>3, 'name'=>'광석농협' ],
        [ 'code'=>'nh461047', 'sigun'=>'cnns', 'active'=>1, 'seq'=>4, 'name'=>'노성농협' ],
        [ 'code'=>'nh461058', 'sigun'=>'cnns', 'active'=>1, 'seq'=>5, 'name'=>'상월농협' ],
        [ 'code'=>'nh461070', 'sigun'=>'cnns', 'active'=>1, 'seq'=>6, 'name'=>'논산계룡농협' ],
        [ 'code'=>'nh461106', 'sigun'=>'cnns', 'active'=>1, 'seq'=>7, 'name'=>'양촌농협' ],
        [ 'code'=>'nh461117', 'sigun'=>'cnns', 'active'=>1, 'seq'=>8, 'name'=>'강경농협' ],
        [ 'code'=>'nh461128', 'sigun'=>'cnns', 'active'=>1, 'seq'=>9, 'name'=>'성동농협' ],
        [ 'code'=>'nh461140', 'sigun'=>'cnns', 'active'=>1, 'seq'=>10, 'name'=>'연무농협' ],
        // // 당진시(12)
        [ 'code'=>'nh481010', 'sigun'=>'cndj', 'active'=>1, 'seq'=>1, 'name'=>'당진농협' ],
        [ 'code'=>'nh481021', 'sigun'=>'cndj', 'active'=>1, 'seq'=>2, 'name'=>'고대농협' ],
        [ 'code'=>'nh481032', 'sigun'=>'cndj', 'active'=>1, 'seq'=>3, 'name'=>'석문농협' ],
        [ 'code'=>'nh481043', 'sigun'=>'cndj', 'active'=>1, 'seq'=>4, 'name'=>'대호지농협' ],
        [ 'code'=>'nh481054', 'sigun'=>'cndj', 'active'=>1, 'seq'=>5, 'name'=>'정미농협' ],
        [ 'code'=>'nh481065', 'sigun'=>'cndj', 'active'=>1, 'seq'=>6, 'name'=>'면천농협' ],
        [ 'code'=>'nh481076', 'sigun'=>'cndj', 'active'=>1, 'seq'=>7, 'name'=>'순성농협' ],
        [ 'code'=>'nh481087', 'sigun'=>'cndj', 'active'=>1, 'seq'=>8, 'name'=>'합덕농협' ],
        [ 'code'=>'nh481098', 'sigun'=>'cndj', 'active'=>1, 'seq'=>9, 'name'=>'우강농협' ],
        [ 'code'=>'nh481102', 'sigun'=>'cndj', 'active'=>1, 'seq'=>10, 'name'=>'신평농협' ],
        [ 'code'=>'nh481113', 'sigun'=>'cndj', 'active'=>1, 'seq'=>11, 'name'=>'송악농협' ],
        [ 'code'=>'nh481124', 'sigun'=>'cndj', 'active'=>1, 'seq'=>12, 'name'=>'송산농협' ],
        // // 금산군(4)
        [ 'code'=>'nh451011', 'sigun'=>'cngs', 'active'=>1, 'seq'=>1, 'name'=>'금산농협' ],
        [ 'code'=>'nh451055', 'sigun'=>'cngs', 'active'=>1, 'seq'=>2, 'name'=>'부리농협' ],
        [ 'code'=>'nh451088', 'sigun'=>'cngs', 'active'=>1, 'seq'=>3, 'name'=>'만인산농협' ],
        [ 'code'=>'nh451099', 'sigun'=>'cngs', 'active'=>1, 'seq'=>4, 'name'=>'진산농협' ],
        // // 부여군(7)
        [ 'code'=>'nh463016', 'sigun'=>'cnby', 'active'=>1, 'seq'=>1, 'name'=>'세도농협' ],
        [ 'code'=>'nh463038', 'sigun'=>'cnby', 'active'=>1, 'seq'=>2, 'name'=>'장암농협' ],
        [ 'code'=>'nh463094', 'sigun'=>'cnby', 'active'=>1, 'seq'=>3, 'name'=>'규암농협' ],
        [ 'code'=>'nh463119', 'sigun'=>'cnby', 'active'=>1, 'seq'=>4, 'name'=>'구룡농협' ],
        [ 'code'=>'nh463131', 'sigun'=>'cnby', 'active'=>1, 'seq'=>5, 'name'=>'서부여농협' ],
        [ 'code'=>'nh463142', 'sigun'=>'cnby', 'active'=>1, 'seq'=>6, 'name'=>'부여농협' ],
        [ 'code'=>'nh463164', 'sigun'=>'cnby', 'active'=>1, 'seq'=>7, 'name'=>'동부여농협' ],
        // // 서천군(6)
        [ 'code'=>'nh465018', 'sigun'=>'cnsc', 'active'=>1, 'seq'=>1, 'name'=>'서천농협' ],
        [ 'code'=>'nh465041', 'sigun'=>'cnsc', 'active'=>1, 'seq'=>2, 'name'=>'판교농협' ],
        [ 'code'=>'nh465063', 'sigun'=>'cnsc', 'active'=>1, 'seq'=>3, 'name'=>'서서천농협' ],
        [ 'code'=>'nh465085', 'sigun'=>'cnsc', 'active'=>1, 'seq'=>4, 'name'=>'한산농협' ],
        [ 'code'=>'nh465100', 'sigun'=>'cnsc', 'active'=>1, 'seq'=>5, 'name'=>'동서천농협' ],
        [ 'code'=>'nh465122', 'sigun'=>'cnsc', 'active'=>1, 'seq'=>6, 'name'=>'장항농협' ],
        // // 청양군(3)
        [ 'code'=>'nh471017', 'sigun'=>'cncy', 'active'=>1, 'seq'=>1, 'name'=>'청양농협' ],
        [ 'code'=>'nh471040', 'sigun'=>'cncy', 'active'=>1, 'seq'=>2, 'name'=>'정산농협' ],
        [ 'code'=>'nh471095', 'sigun'=>'cncy', 'active'=>1, 'seq'=>3, 'name'=>'화성농협' ],
        // // 홍성군(10)
        [ 'code'=>'nh473019', 'sigun'=>'cnhs', 'active'=>1, 'seq'=>1, 'name'=>'홍성농협' ],
        [ 'code'=>'nh473020', 'sigun'=>'cnhs', 'active'=>1, 'seq'=>2, 'name'=>'홍북농협' ],
        [ 'code'=>'nh473031', 'sigun'=>'cnhs', 'active'=>1, 'seq'=>3, 'name'=>'금마농협' ],
        [ 'code'=>'nh473042', 'sigun'=>'cnhs', 'active'=>1, 'seq'=>4, 'name'=>'홍동농협' ],
        [ 'code'=>'nh473053', 'sigun'=>'cnhs', 'active'=>1, 'seq'=>5, 'name'=>'구항농협' ],
        [ 'code'=>'nh473064', 'sigun'=>'cnhs', 'active'=>1, 'seq'=>6, 'name'=>'갈산농협' ],
        [ 'code'=>'nh473075', 'sigun'=>'cnhs', 'active'=>1, 'seq'=>7, 'name'=>'광천농협' ],
        [ 'code'=>'nh473086', 'sigun'=>'cnhs', 'active'=>1, 'seq'=>8, 'name'=>'장곡농협' ],
        [ 'code'=>'nh473101', 'sigun'=>'cnhs', 'active'=>1, 'seq'=>9, 'name'=>'결성농협' ],
        [ 'code'=>'nh473112', 'sigun'=>'cnhs', 'active'=>1, 'seq'=>10, 'name'=>'서부농협' ],
        // // 예산군(7)
        [ 'code'=>'nh475011', 'sigun'=>'cnys', 'active'=>1, 'seq'=>1, 'name'=>'신양농협' ],
        [ 'code'=>'nh475022', 'sigun'=>'cnys', 'active'=>1, 'seq'=>2, 'name'=>'예산중앙농협' ],
        [ 'code'=>'nh475066', 'sigun'=>'cnys', 'active'=>1, 'seq'=>3, 'name'=>'광시농협' ],
        [ 'code'=>'nh475077', 'sigun'=>'cnys', 'active'=>1, 'seq'=>4, 'name'=>'삽교농협' ],
        [ 'code'=>'nh475088', 'sigun'=>'cnys', 'active'=>1, 'seq'=>5, 'name'=>'덕산농협' ],
        [ 'code'=>'nh475103', 'sigun'=>'cnys', 'active'=>1, 'seq'=>6, 'name'=>'고덕농협' ],
        [ 'code'=>'nh475125', 'sigun'=>'cnys', 'active'=>1, 'seq'=>7, 'name'=>'예산농협' ],
        // // 태안군(6)
        [ 'code'=>'nh477127', 'sigun'=>'cnta', 'active'=>1, 'seq'=>1, 'name'=>'안면도농협' ],
        [ 'code'=>'nh477138', 'sigun'=>'cnta', 'active'=>1, 'seq'=>2, 'name'=>'남면농협' ],
        [ 'code'=>'nh477149', 'sigun'=>'cnta', 'active'=>1, 'seq'=>3, 'name'=>'태안농협' ],
        [ 'code'=>'nh477150', 'sigun'=>'cnta', 'active'=>1, 'seq'=>4, 'name'=>'근흥농협' ],
        [ 'code'=>'nh477161', 'sigun'=>'cnta', 'active'=>1, 'seq'=>5, 'name'=>'소원농협' ],
        [ 'code'=>'nh477172', 'sigun'=>'cnta', 'active'=>1, 'seq'=>6, 'name'=>'원북농협' ],
        // // 품농(5)
        [ 'code'=>'nh457811', 'sigun'=>'cngj', 'active'=>1, 'seq'=>99, 'name'=>'세종공주원예농협' ],
        [ 'code'=>'nh475815', 'sigun'=>'cnys', 'active'=>1, 'seq'=>99, 'name'=>'예산능금농협' ],
        [ 'code'=>'nh477817', 'sigun'=>'cnss', 'active'=>1, 'seq'=>99, 'name'=>'충서원예농협' ],
        [ 'code'=>'nh483816', 'sigun'=>'cnas', 'active'=>1, 'seq'=>99, 'name'=>'아산원예농협' ],
        [ 'code'=>'nh485818', 'sigun'=>'cnca', 'active'=>1, 'seq'=>99, 'name'=>'천안배농협' ],
    ];

    public function run()
    {
        foreach ($this->nonghyups as $nonghyup) {
            App\Nonghyup::create([
                'code' => $nonghyup['code'],
                'sigun' => $nonghyup['sigun'],
                'seq' => $nonghyup['seq'],
                'name' => $nonghyup['name']
            ]);
        }
    }
}
