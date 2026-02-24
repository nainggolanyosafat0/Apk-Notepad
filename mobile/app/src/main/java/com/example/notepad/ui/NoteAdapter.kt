package com.example.notepad.ui

import android.view.LayoutInflater
import android.view.ViewGroup
import androidx.recyclerview.widget.RecyclerView
import com.example.notepad.databinding.ItemNoteBinding
import com.example.notepad.model.Note

class NoteAdapter(
    private var notes: List<Note>,
    private val onNoteClick: (Note) -> Unit
) : RecyclerView.Adapter<NoteAdapter.NoteViewHolder>() {

    class NoteViewHolder(val binding: ItemNoteBinding) : RecyclerView.ViewHolder(binding.root)

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): NoteViewHolder {
        val binding = ItemNoteBinding.inflate(LayoutInflater.from(parent.context), parent, false)
        return NoteViewHolder(binding)
    }

    override fun onBindViewHolder(holder: NoteViewHolder, position: Int) {
        val note = notes[position]
        holder.binding.tvNoteTitle.text = note.title
        holder.binding.tvNoteContent.text = note.content
        holder.binding.tvNoteDate.text = note.createdAt ?: ""
        
        holder.itemView.setOnClickListener { onNoteClick(note) }
    }

    override fun getItemCount(): Int = notes.size

    fun updateData(newNotes: List<Note>) {
        notes = newNotes
        notifyDataSetChanged()
    }
}
