<?php

declare(strict_types=1);

namespace ApiDocumentation\Swagger\Api\RoomController\ApiRoutes;

//GET|HEAD  api/houses/{house_id}/rooms .............................................................................. api.houses.rooms.index › Api\Room\RoomController@index
//POST      api/houses/{house_id}/rooms .............................................................................. api.houses.rooms.store › Api\Room\RoomController@store
//GET|HEAD  api/houses/{house_id}/rooms/form ............................................................. api.houses.rooms.form.store › Api\Room\RoomController@getFormStore
//GET|HEAD  api/houses/{house_id}/rooms/{room_id} ...................................................................... api.houses.rooms.show › Api\Room\RoomController@show
//DELETE    api/houses/{house_id}/rooms/{room_id} ................................................................ api.houses.rooms.destroy › Api\Room\RoomController@destroy
//PUT       api/houses/{house_id}/rooms/{room_id} .................................................................. api.houses.rooms.update › Api\Room\RoomController@update
//GET|HEAD  api/houses/{house_id}/rooms/{room_id}/form ................................................. api.houses.rooms.form.update › Api\Room\RoomController@getFormUpdate

define(
    'ROOM_INDEX_ROUTE',
    '/api/houses/{house_id}/rooms'
);

define(
    'ROOM_SHOW_ROUTE',
    '/api/houses/{house_id}/rooms/{room_id}'
);

define(
    'ROOM_FORM_CREATE_ROUTE',
    '/api/houses/{house_id}/rooms/form'
);

define(
    'ROOM_FORM_UPDATE_ROUTE',
    '/api/houses/{house_id}/rooms/{room_id}/form'
);

define(
    'ROOM_STORE_ROUTE',
    '/api/houses/{house_id}/rooms'
);

define(
    'ROOM_UPDATE_ROUTE',
    '/api/houses/{house_id}/rooms/{room_id}'
);

define(
    'ROOM_DELETE_ROUTE',
    '/api/houses/{house_id}/rooms/{room_id}'
);



final readonly class Routes
{
    //
}
