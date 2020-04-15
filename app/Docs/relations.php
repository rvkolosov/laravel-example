<?php

/**
 * @OA\Schema(
 *     schema="Relations",
 *     description="Relations",
 *     type="object",
 *     title="Relations",
 *
 *  @OA\Property(
 *      property="User",
 *      type="string",
 *      description="Relations for User model",
 *      enum={"roles", "todos"}
 *  ),
 *  @OA\Property(
 *      property="Role",
 *      type="string",
 *      description="Relations for Role model",
 *      enum={"users", "permissions"}
 *  ),
 *  @OA\Property(
 *      property="Permission",
 *      type="string",
 *      description="Relations for Permission model",
 *      enum={"roles"}
 *  ),
 *  @OA\Property(
 *      property="Todo",
 *      type="string",
 *      description="Relations for Todo model",
 *      enum={"user"}
 *  ),
 * )
 */