package com.example.notepad.ui

import android.os.Bundle
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import androidx.recyclerview.widget.LinearLayoutManager
import com.example.notepad.databinding.ActivityMainBinding
import com.example.notepad.api.RetrofitClient
import com.example.notepad.model.ApiResponse
import com.example.notepad.model.Folder
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class MainActivity : AppCompatActivity() {

    private lateinit var binding: ActivityMainBinding
    private lateinit var adapter: FolderAdapter

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityMainBinding.inflate(layoutInflater)
        setContentView(binding.root)

        setupRecyclerView()
        fetchFolders()

        binding.fabAddFolder.setOnClickListener {
            // Show Add Folder Dialog (Implementation omitted for brevity)
            Toast.makeText(this, "Feature: Add Folder coming soon", Toast.LENGTH_SHORT).show()
        }
    }

    private fun setupRecyclerView() {
        adapter = FolderAdapter(emptyList()) { folder ->
            val intent = android.content.Intent(this, NoteListActivity::class.java).apply {
                putExtra("FOLDER_ID", folder.id)
                putExtra("FOLDER_NAME", folder.name)
            }
            startActivity(intent)
        }
        binding.rvFolders.layoutManager = LinearLayoutManager(this)
        binding.rvFolders.adapter = adapter
    }

    private fun fetchFolders() {
        RetrofitClient.instance.getFolders().enqueue(object : Callback<ApiResponse<List<Folder>>> {
            override fun onResponse(call: Call<ApiResponse<List<Folder>>>, response: Response<ApiResponse<List<Folder>>>) {
                if (response.isSuccessful) {
                    val folders = response.body()?.data ?: emptyList()
                    adapter.updateData(folders)
                } else {
                    Toast.makeText(this@MainActivity, "Failed to load folders", Toast.LENGTH_SHORT).show()
                }
            }

            override fun onFailure(call: Call<ApiResponse<List<Folder>>>, t: Throwable) {
                Toast.makeText(this@MainActivity, "Error: ${t.message}", Toast.LENGTH_SHORT).show()
            }
        })
    }
}
