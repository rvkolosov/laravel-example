<?php

/** @OA\Schema(
 *     schema="Todo",
 *     description="Todo",
 *     type="object",
 *     title="Todo",
 *
 *  @OA\Property(
 *      property="id",
 *      type="integer",
 *      format="int64",
 *      description="Todo id"
 *  ),
 *  @OA\Property(
 *      property="user_id",
 *      type="integer",
 *      format="int64",
 *      description="Todo owner id"
 *  ),
 *  @OA\Property(
 *      property="name",
 *      type="string",
 *      maxProperties=255,
 *      description="Todo name"
 *  ),
 *  @OA\Property(
 *      property="description",
 *      type="string",
 *      maxProperties=255,
 *      description="Todo description"
 *  ),
 *  @OA\Property(
 *      property="is_complete",
 *      type="boolean",
 *      description="Todo state, default is false"
 *  )
 * )
 */

/**
 * @OA\Get(
 *   tags={"Todo"},
 *   path="/api/todos",
 *   @OA\Parameter(ref="#/components/parameters/paginate_count"),
 *   @OA\Parameter(ref="#/components/parameters/relations"),
 *   @OA\Response(response="200", ref="#/components/responses/200"),
 *   @OA\Response(response="404", ref="#/components/responses/404"),
 *   @OA\Response(response="500", ref="#/components/responses/500"),
 * )
 */

/**
 * @OA\Post(
 *   tags={"Todo"},
 *   path="/api/todos",
 *   @OA\Parameter(
 *      name="user_id",
 *      description="Todo owner id",
 *      @OA\Schema(
 *          type="integer",
 *          format="int64"
 *      ),
 *      in="query",
 *      required=true
 *   ),
 *   @OA\Parameter(
 *      name="name",
 *      description="Todo name",
 *      @OA\Schema(
 *          type="string"
 *      ),
 *      in="query",
 *      required=true
 *   ),
 *   @OA\Parameter(
 *      name="description",
 *      description="Todo description",
 *      @OA\Schema(
 *          type="string"
 *      ),
 *      in="query"
 *   ),
 *   @OA\Parameter(
 *      name="is_complete",
 *      description="Todo state, default is false",
 *      @OA\Schema(
 *          type="boolean"
 *      ),
 *      in="query"
 *   ),
 *   @OA\Response(response="201", ref="#/components/responses/201"),
 *   @OA\Response(response="401", ref="#/components/responses/401"),
 *   @OA\Response(response="403", ref="#/components/responses/403"),
 *   @OA\Response(response="422", ref="#/components/responses/422"),
 *   @OA\Response(response="500", ref="#/components/responses/500"),
 * )
 */

/**
 * @OA\Get(
 *   tags={"Todo"},
 *   path="/api/todos/{id}",
 *   @OA\Parameter(ref="#/components/parameters/id"),
 *   @OA\Parameter(ref="#/components/parameters/relations"),
 *   @OA\Response(response="200", ref="#/components/responses/200"),
 *   @OA\Response(response="404", ref="#/components/responses/404"),
 *   @OA\Response(response="500", ref="#/components/responses/500"),
 * )
 */

/**
 * @OA\Put(
 *   tags={"Todo"},
 *   path="/api/todos/{id}",
 *   @OA\Parameter(ref="#/components/parameters/id"),
 *   @OA\Parameter(
 *      name="user_id",
 *      description="Todo owner id",
 *      @OA\Schema(
 *          type="integer",
 *          format="int64"
 *      ),
 *      in="query"
 *   ),
 *   @OA\Parameter(
 *      name="name",
 *      description="Todo name",
 *      @OA\Schema(
 *          type="string"
 *      ),
 *      in="query"
 *   ),
 *   @OA\Parameter(
 *      name="description",
 *      description="Todo description",
 *      @OA\Schema(
 *          type="string"
 *      ),
 *      in="query"
 *   ),
 *   @OA\Parameter(
 *      name="is_complete",
 *      description="Todo state, default is false",
 *      @OA\Schema(
 *          type="boolean"
 *      ),
 *      in="query"
 *   ),
 *   @OA\Response(response="201", ref="#/components/responses/201"),
 *   @OA\Response(response="401", ref="#/components/responses/401"),
 *   @OA\Response(response="403", ref="#/components/responses/403"),
 *   @OA\Response(response="404", ref="#/components/responses/404"),
 *   @OA\Response(response="422", ref="#/components/responses/422"),
 *   @OA\Response(response="500", ref="#/components/responses/500"),
 * )
 */

/**
 * @OA\Delete(
 *   tags={"Todo"},
 *   path="/api/todos/{id}",
 *   @OA\Parameter(ref="#/components/parameters/id"),
 *   @OA\Response(response="201", ref="#/components/responses/200"),
 *   @OA\Response(response="404", ref="#/components/responses/404"),
 *   @OA\Response(response="500", ref="#/components/responses/500"),
 * )
 */


