package com.example.notepad.ui

import android.os.Bundle
import android.widget.Toast
import androidx.appcompat.app.AppCompatActivity
import androidx.recyclerview.widget.LinearLayoutManager
import com.example.notepad.api.RetrofitClient
import com.example.notepad.databinding.ActivityNoteListBinding
import com.example.notepad.model.ApiResponse
import com.example.notepad.model.Note
import retrofit2.Call
import retrofit2.Callback
import retrofit2.Response

class NoteListActivity : AppCompatActivity() {

    private lateinit var binding: ActivityNoteListBinding
    private lateinit var adapter: NoteAdapter
    private var folderId: Int = -1
    private var folderName: String = ""

    override fun onCreate(savedInstanceState: Bundle?) {
        super.onCreate(savedInstanceState)
        binding = ActivityNoteListBinding.inflate(layoutInflater)
        setContentView(binding.root)

        folderId = intent.getIntExtra("FOLDER_ID", -1)
        folderName = intent.getStringExtra("FOLDER_NAME") ?: "Notes"

        binding.tvFolderName.text = folderName
        binding.btnBack.setOnClickListener { finish() }

        setupRecyclerView()
        fetchNotes()

        binding.fabAddNote.setOnClickListener {
            // Show Add Note Dialog/Activity (Coming soon)
            Toast.makeText(this, "Feature: Add Note coming soon", Toast.LENGTH_SHORT).show()
        }
    }

    private fun setupRecyclerView() {
        adapter = NoteAdapter(emptyList()) { note ->
            // View/Edit Note (Coming soon)
            Toast.makeText(this, "Clicked: ${note.title}", Toast.LENGTH_SHORT).show()
        }
        binding.rvNotes.layoutManager = LinearLayoutManager(this)
        binding.rvNotes.adapter = adapter
    }

    private fun fetchNotes() {
        RetrofitClient.instance.getNotes(folderId).enqueue(object : Callback<ApiResponse<List<Note>>> {
            override fun onResponse(call: Call<ApiResponse<List<Note>>>, response: Response<ApiResponse<List<Note>>>) {
                if (response.isSuccessful) {
                    val notes = response.body()?.data ?: emptyList()
                    adapter.updateData(notes)
                } else {
                    Toast.makeText(this@NoteListActivity, "Failed to load notes", Toast.LENGTH_SHORT).show()
                }
            }

            override fun onFailure(call: Call<ApiResponse<List<Note>>>, t: Throwable) {
                Toast.makeText(this@NoteListActivity, "Error: ${t.message}", Toast.LENGTH_SHORT).show()
            }
        })
    }
}
