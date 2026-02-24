package com.example.notepad.api

import retrofit2.Retrofit
import retrofit2.converter.gson.GsonFactory

object RetrofitClient {
    // 10.0.2.2 is the special IP for Android Emulator to access host machine localhost
    private const val BASE_URL = "http://10.0.2.2:8000/api/"

    val instance: ApiService by lazy {
        val retrofit = Retrofit.Builder()
            .baseUrl(BASE_URL)
            .addConverterFactory(GsonConverterFactory.create())
            .build()

        retrofit.create(ApiService::class.java)
    }
}
