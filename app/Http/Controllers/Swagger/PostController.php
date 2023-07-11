<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *     path="/api/posts",
 *     summary="Создание",
 *     tags={"Post"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\RequestBody(
 *          @OA\JsonContent(
 *              allOf={
 *                  @OA\Schema(
 *                      @OA\Property(property="title", type="string", example="Заголовок"),
 *                      @OA\Property(property="likes", type="integer", example=20),
 *                  )
 *              }
 *          )
 *     ),
 *
 *     @OA\Response(
 *         response=201,
 *         description="Ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="title", type="string", example="Заголовок"),
 *                 @OA\Property(property="likes", type="integer", example=20),
 *             ),
 *         )
 *     ),
 *
 *     @OA\Response(
 *          response=401,
 *          description="Error: Unauthorized",
 *          @OA\JsonContent(
 *              @OA\Property(property="message", type="string", example="Token not provided"),
 *         )
 *     ),
 * ),
 *
 * @OA\Get(
 *     path="/api/posts",
 *     summary="Список",
 *     tags={"Post"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="array", @OA\Items(
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="title", type="string", example="Заголовок"),
 *                 @OA\Property(property="likes", type="integer", example=20),
 *             )),
 *         )
 *     ),
 *
 *     @OA\Response(
 *          response=401,
 *          description="Error: Unauthorized",
 *          @OA\JsonContent(
 *              @OA\Property(property="message", type="string", example="Token not provided"),
 *         )
 *     ),
 * ),
 *
 * @OA\Get(
 *     path="/api/posts/{post}",
 *     summary="Одна запись",
 *     tags={"Post"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\Parameter(
 *         description="ID записи",
 *         in="path",
 *         name="post",
 *         required=true,
 *         example=1
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="title", type="string", example="Заголовок"),
 *                 @OA\Property(property="likes", type="integer", example=20),
 *             ),
 *         )
 *     ),
 *
 *     @OA\Response(
 *          response=401,
 *          description="Error: Unauthorized",
 *          @OA\JsonContent(
 *              @OA\Property(property="message", type="string", example="Token not provided"),
 *         )
 *     ),
 * ),
 *
 * @OA\Patch(
 *     path="/api/posts/{post}",
 *     summary="Обновление",
 *     tags={"Post"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\Parameter(
 *         description="ID записи",
 *         in="path",
 *         name="post",
 *         required=true,
 *         example=1
 *     ),
 *
 *     @OA\RequestBody(
 *          @OA\JsonContent(
 *              allOf={
 *                  @OA\Schema(
 *                      @OA\Property(property="title", type="string", example="Заголовок"),
 *                      @OA\Property(property="likes", type="integer", example=20),
 *                  )
 *              }
 *          )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="data", type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="title", type="string", example="Заголовок"),
 *                 @OA\Property(property="likes", type="integer", example=20),
 *             ),
 *         )
 *     ),
 *
 *     @OA\Response(
 *          response=401,
 *          description="Error: Unauthorized",
 *          @OA\JsonContent(
 *              @OA\Property(property="message", type="string", example="Token not provided"),
 *         )
 *     ),
 * ),
 *
 * @OA\Delete(
 *     path="/api/posts/{post}",
 *     summary="Удаление",
 *     tags={"Post"},
 *     security={{ "bearerAuth": {} }},
 *
 *     @OA\Parameter(
 *         description="ID записи",
 *         in="path",
 *         name="post",
 *         required=true,
 *         example=1
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="done"),
 *         ),
 *     ),
 *
 *     @OA\Response(
 *          response=401,
 *          description="Error: Unauthorized",
 *          @OA\JsonContent(
 *              @OA\Property(property="message", type="string", example="Token not provided"),
 *         )
 *     ),
 * ),
 */
class PostController extends Controller
{
    //
}
