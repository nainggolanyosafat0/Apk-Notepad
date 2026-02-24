package com.example.notepad.api

import com.example.notepad.model.ApiResponse
import com.example.notepad.model.Folder
import com.example.notepad.model.Note
import retrofit2.Call
import retrofit2.http.*

interface ApiService {
    
    // FOLDERS
    @GET("folders")
    fun getFolders(): Call<ApiResponse<List<Folder>>>

    @POST("folders")
    fun createFolder(@Body folder: Map<String, String>): Call<ApiResponse<Folder>>

    @GET("folders/{id}")
    fun getFolderDetails(@Path("id") id: Int): Call<ApiResponse<Folder>>

    @PUT("folders/{id}")
    fun updateFolder(@Path("id") id: Int, @Body folder: Map<String, String>): Call<ApiResponse<Folder>>

    @DELETE("folders/{id}")
    fun deleteFolder(@Path("id") id: Int): Call<ApiResponse<Unit>>

    // NOTES
    @GET("notes")
    fun getNotes(@Query("folder_id") folderId: Int? = null): Call<ApiResponse<List<Note>>>

    @POST("notes")
    fun createNote(@Body note: Map<String, String>): Call<ApiResponse<Note>>

    @PUT("notes/{id}")
    fun updateNote(@Path("id") id: Int, @Body note: Map<String, String>): Call<ApiResponse<Note>>

    @DELETE("notes/{id}")
    fun deleteNote(@Path("id") id: Int): Call<ApiResponse<Unit>>
}
