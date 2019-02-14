<?php

/**
 * @OA\Info(
 *   title="Swagger Example",
 *   version="1.0.0",
 *   @OA\Contact(
 *     email="roman.kolosov12@yandex.ru"
 *   )
 * )
 */

/**
 * @OA\Parameter(
 *   parameter="id",
 *   name="id",
 *   description="Model id",
 *   @OA\Schema(
 *     type="integer",
 *     format="int64"
 *   ),
 *   in="path",
 *   required=true
 * )
 */

/**
 * @OA\Parameter(
 *   parameter="paginate_count",
 *   name="count",
 *   description="Count items for pagination, default is 15",
 *   @OA\Schema(
 *     type="integer",
 *   ),
 *   in="query",
 *   required=false
 * )
 */

/**
 * @OA\Parameter(
 *   parameter="relations",
 *   name="with[]",
 *   description="Relations for model, default is null",
 *   @OA\Schema(
 *     type="array",
 *     @OA\Items(type="string"),
 *   ),
 *   in="query",
 *   required=false
 * )
 */