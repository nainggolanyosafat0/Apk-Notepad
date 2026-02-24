package com.example.notepad.model

import com.google.gson.annotations.SerializedName

data class ApiResponse<T>(
    @SerializedName("success") val success: Boolean,
    @SerializedName("message") val message: String?,
    @SerializedName("data") val data: T
)

data class Folder(
    @SerializedName("id") val id: Int,
    @SerializedName("name") val name: String,
    @SerializedName("notes_count") val notesCount: Int? = 0,
    @SerializedName("created_at") val createdAt: String? = null
)

data class Note(
    @SerializedName("id") val id: Int,
    @SerializedName("folder_id") val folderId: Int,
    @SerializedName("title") val title: String,
    @SerializedName("content") val content: String?,
    @SerializedName("created_at") val createdAt: String? = null
)
