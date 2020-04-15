<?php

/**
 * @OA\Post(
 *   tags={"PermissionRole"},
 *   path="/api/permissions/{permission}/roles/{role}",
 *   @OA\Parameter(
 *      name="permission",
 *      description="Permission id",
 *      @OA\Schema(
 *          type="integer",
 *          format="int64"
 *      ),
 *      in="path",
 *      required=true
 *   ),
 *   @OA\Parameter(
 *      name="role",
 *      description="Role id",
 *      @OA\Schema(
 *          type="integer",
 *          format="int64"
 *      ),
 *      in="path",
 *      required=true
 *   ),
 *   @OA\Response(response="201", ref="#/components/responses/200"),
 *   @OA\Response(response="401", ref="#/components/responses/401"),
 *   @OA\Response(response="403", ref="#/components/responses/403"),
 *   @OA\Response(response="404", ref="#/components/responses/404"),
 *   @OA\Response(response="500", ref="#/components/responses/500"),
 * )
 */

/**
 * @OA\Delete(
 *   tags={"PermissionRole"},
 *   path="/api/permissions/{permission}/roles/{role}",
 *   @OA\Parameter(
 *      name="permission",
 *      description="Permission id",
 *      @OA\Schema(
 *          type="integer",
 *          format="int64"
 *      ),
 *      in="path",
 *      required=true
 *   ),
 *   @OA\Parameter(
 *      name="role",
 *      description="Role id",
 *      @OA\Schema(
 *          type="integer",
 *          format="int64"
 *      ),
 *      in="path",
 *      required=true
 *   ),
 *   @OA\Response(response="201", ref="#/components/responses/200"),
 *   @OA\Response(response="401", ref="#/components/responses/401"),
 *   @OA\Response(response="403", ref="#/components/responses/403"),
 *   @OA\Response(response="404", ref="#/components/responses/404"),
 *   @OA\Response(response="500", ref="#/components/responses/500"),
 * )
 */