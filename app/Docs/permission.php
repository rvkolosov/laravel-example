<?php

/**
 * @OA\Schema(
 *     schema="Permission",
 *     description="Permission",
 *     type="object",
 *     title="Permission",
 *
 *  @OA\Property(
 *      property="id",
 *      type="integer",
 *      description="The permission id"
 *  ),
 *  @OA\Property(
 *      property="name",
 *      type="string",
 *      maxProperties=80,
 *      description="The permission name"
 *  ),
 *  @OA\Property(
 *      property="description",
 *      type="string",
 *      maxProperties=255,
 *      description="The permission description"
 *  )
 * )
 */

/**
 * @OA\Get(
 *   tags={"Permission"},
 *   path="/api/permissions",
 *   @OA\Parameter(ref="#/components/parameters/paginate_count"),
 *   @OA\Parameter(ref="#/components/parameters/relations"),
 *   @OA\Response(response="200", ref="#/components/responses/200"),
 *   @OA\Response(response="404", ref="#/components/responses/404"),
 *   @OA\Response(response="500", ref="#/components/responses/500"),
 * )
 */

/**
 * @OA\Post(
 *   tags={"Permission"},
 *   path="/api/permissions",
 *   @OA\Parameter(
 *      name="name",
 *      description="Permission name",
 *      @OA\Schema(
 *          type="string"
 *      ),
 *      in="query",
 *      required=true
 *   ),
 *   @OA\Parameter(
 *      name="description",
 *      description="Permission description",
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
 *   tags={"Permission"},
 *   path="/api/permissions/{id}",
 *   @OA\Parameter(ref="#/components/parameters/id"),
 *   @OA\Parameter(ref="#/components/parameters/relations"),
 *   @OA\Response(response="200", ref="#/components/responses/200"),
 *   @OA\Response(response="404", ref="#/components/responses/404"),
 *   @OA\Response(response="500", ref="#/components/responses/500"),
 * )
 */

/**
 * @OA\Put(
 *   tags={"Permission"},
 *   path="/api/permissions/{id}",
 *   @OA\Parameter(ref="#/components/parameters/id"),
 *   @OA\Parameter(
 *      name="name",
 *      description="Permission name",
 *      @OA\Schema(
 *          type="string"
 *      ),
 *      in="query"
 *   ),
 *   @OA\Parameter(
 *      name="description",
 *      description="Permission description",
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
 *   tags={"Permission"},
 *   path="/api/permissions/{id}",
 *   @OA\Parameter(ref="#/components/parameters/id"),
 *   @OA\Response(response="201", ref="#/components/responses/200"),
 *   @OA\Response(response="404", ref="#/components/responses/404"),
 *   @OA\Response(response="500", ref="#/components/responses/500"),
 * )
 */