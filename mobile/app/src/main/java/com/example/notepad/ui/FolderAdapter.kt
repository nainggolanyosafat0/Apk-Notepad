package com.example.notepad.ui

import android.view.LayoutInflater
import android.view.View
import android.view.ViewGroup
import android.widget.TextView
import androidx.recyclerview.widget.RecyclerView
import com.example.notepad.R
import com.example.notepad.model.Folder

class FolderAdapter(
    private var folders: List<Folder>,
    private val onItemClick: (Folder) -> Unit
) : RecyclerView.Adapter<FolderAdapter.FolderViewHolder>() {

    class FolderViewHolder(view: View) : RecyclerView.ViewHolder(view) {
        val tvName: TextView = view.findViewById(R.id.tvFolderName)
        val tvCount: TextView = view.findViewById(R.id.tvNoteCount)
        val btnDelete: android.widget.ImageButton = view.findViewById(R.id.btnDeleteFolder)
    }

    override fun onCreateViewHolder(parent: ViewGroup, viewType: Int): FolderViewHolder {
        val view = LayoutInflater.from(parent.context).inflate(R.layout.item_folder, parent, false)
        return FolderViewHolder(view)
    }

    override fun onBindViewHolder(holder: FolderViewHolder, position: Int) {
        val folder = folders[position]
        holder.tvName.text = folder.name
        holder.tvCount.text = "${folder.notesCount ?: 0} Notes"
        holder.itemView.setOnClickListener { onItemClick(folder) }
    }

    override fun getItemCount() = folders.size

    fun updateData(newFolders: List<Folder>) {
        folders = newFolders
        notifyDataSetChanged()
    }
}
