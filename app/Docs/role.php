<?php

/**
 * @OA\Schema(
 *     schema="Role",
 *     description="Role",
 *     type="object",
 *     title="Role",
 *
 *  @OA\Property(
 *      property="id",
 *      type="integer",
 *      description="The role id"
 *  ),
 *  @OA\Property(
 *      property="name",
 *      type="string",
 *      maxProperties=80,
 *      description="The role name"
 *  ),
 *  @OA\Property(
 *      property="description",
 *      type="string",
 *      maxProperties=255,
 *      description="The role description"
 *  )
 * )
 */

/**
 * @OA\Get(
 *   tags={"Role"},
 *   path="/api/roles",
 *   @OA\Parameter(ref="#/components/parameters/paginate_count"),
 *   @OA\Parameter(ref="#/components/parameters/relations"),
 *   @OA\Response(response="200", ref="#/components/responses/200"),
 *   @OA\Response(response="404", ref="#/components/responses/404"),
 *   @OA\Response(response="500", ref="#/components/responses/500"),
 * )
 */

/**
 * @OA\Post(
 *   tags={"Role"},
 *   path="/api/roles",
 *   @OA\Parameter(
 *      name="name",
 *      description="Role name",
 *      @OA\Schema(
 *          type="string"
 *      ),
 *      in="query",
 *      required=true
 *   ),
 *   @OA\Parameter(
 *      name="description",
 *      description="Role description",
 *      @OA\Schema(
 *          type="string"
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
 *   tags={"Role"},
 *   path="/api/roles/{id}",
 *   @OA\Parameter(ref="#/components/parameters/id"),
 *   @OA\Parameter(ref="#/components/parameters/relations"),
 *   @OA\Response(response="200", ref="#/components/responses/200"),
 *   @OA\Response(response="404", ref="#/components/responses/404"),
 *   @OA\Response(response="500", ref="#/components/responses/500"),
 * )
 */

/**
 * @OA\Put(
 *   tags={"Role"},
 *   path="/api/roles/{id}",
 *   @OA\Parameter(ref="#/components/parameters/id"),
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
 *   tags={"Role"},
 *   path="/api/roles/{id}",
 *   @OA\Parameter(ref="#/components/parameters/id"),
 *   @OA\Response(response="201", ref="#/components/responses/200"),
 *   @OA\Response(response="404", ref="#/components/responses/404"),
 *   @OA\Response(response="500", ref="#/components/responses/500"),
 * )
 */