<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @OA\Post(
 *     path="/api/auth/login",
 *     summary="Авторизация",
 *     tags={"Auth"},
 *
 *     @OA\RequestBody(
 *          @OA\JsonContent(
 *              allOf={
 *                  @OA\Schema(
 *                      @OA\Property(property="email", type="string", example="user@mail.ru"),
 *                      @OA\Property(property="password", type="string", example="password"),
 *                  )
 *              }
 *          )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="access_token", type="string", example="foobar"),
 *             @OA\Property(property="token_type", type="string", example="bearer"),
 *             @OA\Property(property="expires_in", type="integer", example=3600),
 *         )
 *     ),
 *
 *     @OA\Response(
 *          response=401,
 *          description="Error: Unauthorized",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", example="Unauthorized"),
 *         )
 *     ),
 * ),
 *
 * @OA\Post(
 *     path="/api/auth/logout",
 *     summary="Выход",
 *     tags={"Auth"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="Successfully logged out"),
 *         )
 *     ),
 *     @OA\Response(
 *          response=401,
 *          description="Error: Unauthorized",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", example="Unauthenticated"),
 *         )
 *     ),
 * ),
 *
 * @OA\Post(
 *     path="/api/auth/refresh",
 *     summary="Обновление токена",
 *     tags={"Auth"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="access_token", type="string", example="foobar"),
 *             @OA\Property(property="token_type", type="string", example="bearer"),
 *             @OA\Property(property="expires_in", type="integer", example=3600),
 *         )
 *     ),
 *     @OA\Response(
 *          response=401,
 *          description="Error: Unauthorized",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", example="Unauthenticated"),
 *         )
 *     ),
 * ),
 *
 * @OA\Post(
 *     path="/api/auth/me",
 *     summary="Данные пользователя",
 *     tags={"Auth"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="name", type="string", example="user@mail.ru"),
 *             @OA\Property(property="email", type="email", example="user"),
 *             @OA\Property(property="email_verified_at", type="date-time", nullable=true, example="2023-07-07T07:11:40.000000Z"),
 *             @OA\Property(property="created_at", type="date-time", example="2023-07-07T07:11:40.000000Z"),
 *             @OA\Property(property="updated_at", type="date-time", example="2023-07-07T07:11:40.000000Z"),
 *         )
 *     ),
 *     @OA\Response(
 *          response=401,
 *          description="Error: Unauthorized",
 *          @OA\JsonContent(
 *              @OA\Property(property="error", type="string", example="Unauthenticated"),
 *         )
 *     ),
 * ),
 */

class AuthController extends Controller
{
    //
}
