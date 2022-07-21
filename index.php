<?php
    namespace App;

    require_once 'vendor/autoload.php';

    use App\Offers\OffersManager;
    use App\Offers\OffersOperate\OffersDelete;
    use App\Offers\OffersOperate\OffersUpdate;
    use App\SomeClass\FiltersArray\CommonElements;
    use App\SomeClass\FiltersArray\UniqueElementsAnyArray;
    use App\Offers\OffersOperate\OffersAdd;

    $filePath = 'data_light.xml';

    print_r('Введи путь до файла'.PHP_EOL);
    $newFilePath = trim(fgets(STDIN)) ;
    if($newFilePath){
        $filePath = $newFilePath;
    }

    $action = null;
    print_r('Что вы хотите сделать ?'.PHP_EOL);
    print_r('a - Добавить в базу записи, которых в ней ещё нет'.PHP_EOL);
    print_r('b - Обновить записи, пришедшие в XML, которые уже ест в базе'.PHP_EOL);
    print_r('c - Удалить записи из базы, которых нет в XML'.PHP_EOL);
    do
    {
        $action = trim(fgets(STDIN));
    }while(!in_array($action, ['a', 'b', 'c']));

    $manager =  new OffersManager($filePath);;
    switch ($action){
        case 'a':
            $manager->setFilter(new UniqueElementsAnyArray(2));
            $manager->setOperate(new OffersAdd());
            break;
        case 'b':
            $manager->setFilter(new CommonElements());
            $manager->setOperate(new OffersUpdate());
            break;
        case 'c':
            $manager->setFilter(new UniqueElementsAnyArray(1));
            $manager->setOperate(new OffersDelete());
            break;
    }
    $manager->operate();

