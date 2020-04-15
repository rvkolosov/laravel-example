<?php

/**
 * @OA\Post(
 *   tags={"Auth"},
 *   path="/api/auth/login",
 *   @OA\Parameter(
 *      name="email",
 *      description="User email",
 *      @OA\Schema(
 *          type="string"
 *      ),
 *      in="query",
 *      required=true
 *   ),
 *   @OA\Parameter(
 *      name="password",
 *      description="User password",
 *      @OA\Schema(
 *          type="string"
 *      ),
 *      in="query",
 *      required=true
 *   ),
 *   @OA\Response(response="200", ref="#/components/responses/201"),
 *   @OA\Response(response="401", ref="#/components/responses/401"),
 *   @OA\Response(response="404", ref="#/components/responses/404"),
 *   @OA\Response(response="422", ref="#/components/responses/422"),
 *   @OA\Response(response="500", ref="#/components/responses/500"),
 * )
 */

/**
 * @OA\Post(
 *   tags={"Auth"},
 *   path="/api/auth/register",
 *   @OA\Parameter(
 *      name="name",
 *      description="User name",
 *      @OA\Schema(
 *          type="string"
 *      ),
 *      in="query",
 *      required=true
 *   ),
 *   @OA\Parameter(
 *      name="email",
 *      description="User email",
 *      @OA\Schema(
 *          type="string"
 *      ),
 *      in="query",
 *      required=true
 *   ),
 *   @OA\Parameter(
 *      name="password",
 *      description="User password",
 *      @OA\Schema(
 *          type="string"
 *      ),
 *      in="query",
 *      required=true
 *   ),
 *   @OA\Parameter(
 *      name="password_confirmation",
 *      description="Password confirmation",
 *      @OA\Schema(
 *          type="string"
 *      ),
 *      in="query",
 *      required=true
 *   ),
 *   @OA\Response(response="201", ref="#/components/responses/201"),
 *   @OA\Response(response="422", ref="#/components/responses/422"),
 *   @OA\Response(response="500", ref="#/components/responses/500"),
 * )
 */

/**
 * @OA\Post(
 *   tags={"Auth"},
 *   path="/api/auth/change",
 *   @OA\Parameter(
 *      name="email",
 *      description="User email",
 *      @OA\Schema(
 *          type="string"
 *      ),
 *      in="query",
 *      required=true
 *   ),
 *   @OA\Parameter(
 *      name="password",
 *      description="User old passwrod",
 *      @OA\Schema(
 *          type="string"
 *      ),
 *      in="query",
 *      required=true
 *   ),
 *   @OA\Parameter(
 *      name="new_password",
 *      description="User new password",
 *      @OA\Schema(
 *          type="string"
 *      ),
 *      in="query",
 *      required=true
 *   ),
 *   @OA\Parameter(
 *      name="new_password_confirmation",
 *      description="New password confirmation",
 *      @OA\Schema(
 *          type="string"
 *      ),
 *      in="query",
 *      required=true
 *   ),
 *   @OA\Response(response="201", ref="#/components/responses/201"),
 *   @OA\Response(response="401", ref="#/components/responses/401"),
 *   @OA\Response(response="404", ref="#/components/responses/404"),
 *   @OA\Response(response="422", ref="#/components/responses/422"),
 *   @OA\Response(response="500", ref="#/components/responses/500"),
 * )
 */