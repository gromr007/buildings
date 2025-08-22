<?php

declare(strict_types=1);

namespace ApiDocumentation\Swagger\Api\HouseController\ApiRoutes;

//GET|HEAD  api/houses ................................................................................................... api.houses.index › Api\House\HouseController@index
//POST      api/houses ................................................................................................... api.houses.store › Api\House\HouseController@store
//GET|HEAD  api/houses/form .................................................................................. api.houses.form.store › Api\House\HouseController@getFormStore
//GET|HEAD  api/houses/{house_id} .......................................................................................... api.houses.show › Api\House\HouseController@show
//DELETE    api/houses/{house_id} .................................................................................... api.houses.destroy › Api\House\HouseController@destroy
//PUT       api/houses/{house_id} ...................................................................................... api.houses.update › Api\House\HouseController@update
//GET|HEAD  api/houses/{house_id}/form ..................................................................... api.houses.form.update › Api\House\HouseController@getFormUpdate

define(
    'HOUSE_INDEX_ROUTE',
    '/api/houses'
);

define(
    'HOUSE_SHOW_ROUTE',
    '/api/houses/{house_id}'
);

define(
    'HOUSE_FORM_CREATE_ROUTE',
    '/api/houses/form'
);

define(
    'HOUSE_FORM_UPDATE_ROUTE',
    '/api/houses/{house_id}/form'
);

define(
    'HOUSE_STORE_ROUTE',
    '/api/houses'
);

define(
    'HOUSE_UPDATE_ROUTE',
    '/api/houses/{house_id}'
);

define(
    'HOUSE_DELETE_ROUTE',
    '/api/houses/{house_id}'
);


final readonly class Routes
{
    //
}
