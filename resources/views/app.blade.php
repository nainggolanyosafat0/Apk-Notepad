<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notepad Saya</title>
  <style>
    :root {
      --bg-main: #f5f7ff;
      --white: #ffffff;
      --sidebar-bg: #ffffff;
      --text-main: #111827;
      --text-muted: #9ca3af;
      --border-soft: #e5e7eb;
      --shadow-soft: 0 18px 45px rgba(15, 23, 42, 0.08);
      --primary-dark: #020617;
      --chip-bg: #eef2ff;
      --chip-active-bg: #ffffff;
      --chip-active-shadow: 0 8px 25px rgba(129, 140, 248, 0.45);
      --card-purple: #f3e9ff;
      --card-orange: #ffe4d4;
      --card-yellow: #f6f4cf;
      --card-pink: #ffe9f1;
      --folder-start: #ffcc80;
      --folder-end: #ffb74d;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      font-family: "Inter", system-ui, -apple-system, sans-serif;
      background: radial-gradient(circle at top left, #e0f2fe 0, #f5f7ff 38%, #f1f5f9 100%);
      color: var(--text-main);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: stretch;
    }

    a { text-decoration: none; color: inherit; }

    .app {
      display: flex;
      width: 100%;
      max-width: 1440px;
      margin: 24px;
      gap: 24px;
    }

    /* SIDEBAR */
    .sidebar {
      width: 270px;
      background: var(--sidebar-bg);
      border-radius: 32px;
      padding: 24px 22px 20px;
      box-shadow: var(--shadow-soft);
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      flex-shrink: 0;
    }

    .sidebar-top {
      display: flex;
      flex-direction: column;
      gap: 24px;
    }

    .brand {
      display: flex;
      align-items: center;
      gap: 14px;
      margin-bottom: 6px;
    }

    .brand-logo {
      width: 46px;
      height: 46px;
      border-radius: 50%;
      background: linear-gradient(145deg, #4b5563, #1f2937);
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .brand-text {
      display: flex;
      flex-direction: column;
    }

    .app-name {
      font-weight: 700;
      font-size: 19px;
    }

    .user-name {
      font-size: 13px;
      color: #9ca3af;
    }

    .btn-primary {
      background: var(--primary-dark); color: #ffffff; border-radius: 18px;
      padding: 13px 16px; display: flex; align-items: center; justify-content: space-between;
      border: none; cursor: pointer; font-size: 14px; font-weight: 500;
      box-shadow: 0 14px 34px rgba(15, 23, 42, 0.6); width: 100%;
      transition: transform 0.08s ease;
    }
    .btn-primary:hover { transform: translateY(-1px); }
    .btn-left { display: flex; align-items: center; gap: 10px; }
    .btn-icon { width: 24px; height: 24px; border-radius: 999px; background: #020617; display: flex; align-items: center; justify-content: center; }
    .kbd { border-radius: 12px; padding: 4px 8px; font-size: 11px; background: rgba(15, 23, 42, 0.85); color: #e5e7eb; }

    .sidebar-section-title { font-size: 11px; font-weight: 600; text-transform: uppercase; color: var(--text-muted); margin-bottom: 6px; }
    
    .folders-header { display: flex; align-items: center; justify-content: space-between; margin-top: 14px; margin-bottom: 2px; }
    .folders-add { width: 20px; height: 20px; border-radius: 999px; border: 1px dashed var(--border-soft); display: flex; align-items: center; justify-content: center; cursor: pointer; background: #f9fafb; }
    .folder-list { list-style: none; margin-top: 4px; display: flex; flex-direction: column; gap: 2px; }
    .folder-item { padding: 7px 8px; border-radius: 10px; font-size: 14px; color: #6b7280; cursor: pointer; display: flex; justify-content: space-between; align-items: center; }
    .folder-item.active { background: #e5ebff; color: #111827; font-weight: 500; }
    .folder-item:hover:not(.active) { background: #f3f4ff; color: #111827; }
    .folder-count { font-size: 11px; background: rgba(0,0,0,0.05); padding: 2px 6px; border-radius: 8px; }

    .sidebar-bottom { border-top: 1px solid var(--border-soft); padding-top: 14px; margin-top: 18px; display: flex; flex-direction: column; gap: 6px; font-size: 13px; color: var(--text-muted); }

    /* MAIN */
    .main { position: relative; flex: 1; display: flex; flex-direction: column; gap: 22px; min-width: 0; }
    .main-section { background: var(--white); border-radius: 32px; padding: 20px 22px 22px; box-shadow: var(--shadow-soft); }
    .section-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 18px; }
    .section-title { font-size: 22px; font-weight: 600; }
    
    .chip-group { display: inline-flex; background: var(--chip-bg); border-radius: 999px; padding: 4px; gap: 4px; }
    .chip { border-radius: 999px; padding: 6px 18px; font-size: 13px; border: none; background: transparent; cursor: pointer; color: #6b7280; }
    .chip.active { background: var(--chip-active-bg); box-shadow: var(--chip-active-shadow); color: #111827; font-weight: 500; }

    .notes-row { display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 16px; padding-bottom: 12px; }
    .note-card { border-radius: 26px; padding: 16px 18px 14px; position: relative; min-height: 170px; display: flex; flex-direction: column; gap: 8px; flex-shrink: 0; border: 1px solid rgba(148, 163, 184, 0.25); background: #f9fafb; transition: transform 0.1s; }
    .note-card:hover { transform: translateY(-2px); box-shadow: 0 10px 25px rgba(0,0,0,0.05); }
    .note-card.color-1 { background: var(--card-purple); }
    .note-card.color-2 { background: var(--card-orange); }
    .note-card.color-3 { background: var(--card-yellow); }
    .note-card.color-4 { background: var(--card-pink); }
    .note-title { font-weight: 600; font-size: 16px; }
    .note-list { margin-top: 6px; flex: 1; overflow-y: hidden; white-space: pre-wrap; font-size: 13px; color: #4b5563; }
    
    .note-actions {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-top: auto;
        justify-content: flex-end;
    }

    .note-delete, .note-edit-btn {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        border: none;
        transition: transform 0.1s;
    }

    .note-delete { background: #fee2e2; color: #b91c1c; }
    .note-edit-btn { background: #e0e7ff; color: #4338ca; font-size: 15px; }
    
    .note-delete:hover, .note-edit-btn:hover { transform: scale(1.1); }

    /* MODAL */
    .modal-backdrop { position: fixed; inset: 0; background: rgba(15, 23, 42, 0.35); display: none; align-items: center; justify-content: center; z-index: 40; backdrop-filter: blur(2px); }
    .modal-backdrop.show { display: flex; animation: fadeIn 0.15s ease-out; }
    @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }
    .modal { background: #ffffff; border-radius: 24px; padding: 20px 20px 18px; width: 90%; max-width: 400px; box-shadow: 0 22px 60px rgba(15, 23, 42, 0.45); }
    .modal-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 12px; }
    .modal-body label { display: block; font-size: 13px; margin-bottom: 4px; color: #4b5563; }
    .modal-body input, .modal-body textarea, .modal-body select { width: 100%; border-radius: 12px; border: 1px solid #e5e7eb; padding: 10px; font-family: inherit; font-size: 14px; margin-bottom: 14px; outline: none; }
    .modal-body textarea { resize: vertical; min-height: 100px; }
    .modal-footer { display: flex; justify-content: flex-end; align-items: center; gap: 8px; margin-top: 6px; }
    .btn { border-radius: 999px; border: none; padding: 8px 16px; font-size: 13px; cursor: pointer; font-weight: 500; }
    .btn-primary-solid { background: #111827; color: #ffffff; }
    .btn-text { background: transparent; color: #4b5563; }

    /* EMPTY STATE */
    #emptyState {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100%;
        color: var(--text-muted);
        text-align: center;
        margin-top: 100px;
    }

    .alert { padding: 12px 16px; border-radius: 12px; margin-bottom: 16px; font-size: 14px; }
    .alert-success { background: #dcfce7; color: #166534; }
    .alert-error { background: #fee2e2; color: #991b1b; }
    .note-card-add {
        border-radius: 26px;
        min-height: 170px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 12px;
        border: 2px dashed #cbd5e1;
        color: #64748b;
        cursor: pointer;
        transition: all 0.2s ease;
        background: rgba(255, 255, 255, 0.5);
    }
    .note-card-add:hover {
        border-color: #818cf8;
        color: #4f46e5;
        background: #eef2ff;
        transform: translateY(-2px);
    }
    .add-icon {
        font-size: 32px;
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: #f1f5f9;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.2s;
    }
    .note-card-add:hover .add-icon {
        background: #ffffff;
        color: #4f46e5;
    }
  </style>
</head>
<body>

  <div class="app">
    <!-- SIDEBAR -->
    <aside class="sidebar">
      <div class="sidebar-top">
        <div class="brand">
          <div class="brand-logo">
            <svg viewBox="0 0 24 24" width="22" height="22" fill="none">
              <path d="M6 3H14L18 7V21H6V3Z" fill="white"/>
              <path d="M8 11H16M8 14H16M8 17H13" stroke="#1f2937" stroke-width="1.5" stroke-linecap="round"/>
            </svg>
          </div>
          <div class="brand-text">
            <span class="app-name">Notepad Saya</span>
            <span class="user-name">Local User</span>
          </div>
        </div>

        <div>
          <button class="btn-primary" onclick="openNoteModal()">
            <div class="btn-left">
              <div class="btn-icon">+</div>
              <span>Buat Catatan</span>
            </div>
            <span class="kbd">⌘ N</span>
          </button>
        </div>
     
        <div>
            <div class="folders-header">
                <span class="sidebar-section-title">Folders</span>
                <div class="folders-add" onclick="openFolderModal()" title="Add Folder">+</div>
            </div>

            <ul class="folder-list">
                @foreach($folders as $folder)
                    <a href="{{ route('folders.show', $folder->id) }}" 
                       class="folder-item-link" 
                       data-id="{{ $folder->id }}" 
                       data-name="{{ $folder->name }}">
                        <li class="folder-item {{ isset($activeFolder) && $activeFolder->id == $folder->id ? 'active' : '' }}">
                            <span>{{ $folder->name }}</span>
                            @if($folder->notes_count > 0)
                                <span class="folder-count">{{ $folder->notes_count }}</span>
                            @endif
                        </li>
                    </a>
                @endforeach
            </ul>
        </div>
      </div>

      <div class="sidebar-bottom">
        <div class="sidebar-bottom-item">❔ Help</div>
        <div class="sidebar-bottom-item">⚙️ Settings</div>
      </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="main">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(isset($activeFolder))
            <div id="mainSections">
                <section class="main-section">
                    <div class="section-header">
                        <h2 class="section-title">{{ $activeFolder->name }}</h2>
                        <div class="chip-group">
                            <span class="chip active">{{ $notes->count() }} Notes</span>
                        </div>
                    </div>
                    
                    <div class="notes-row">
                        @foreach($notes as $index => $note)
                            <article class="note-card color-{{ ($index % 4) + 1 }}">
                                <div class="note-header">
                                    <div class="note-title">{{ $note->title }}</div>
                                    <div class="note-time" style="font-size:11px; color:#666; margin-top:2px;">
                                        {{ $note->created_at->diffForHumans() }}
                                    </div>
                                </div>
                                <div class="note-list">
                                    {{ $note->content }}
                                </div>
                                
                                <div class="note-actions" style="margin-top: auto; display: flex; gap: 8px; justify-content: flex-end;">
                                    <button class="note-edit-btn" onclick="openNoteModal({{ json_encode($note) }})" title="Edit Note" style="background:none; border:none; cursor:pointer; font-size:16px;">
                                        ✎
                                    </button>
                                    <form action="{{ route('notes.destroy', $note->id) }}" method="POST" onsubmit="return confirm('Hapus catatan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="note-delete" title="Hapus Note">
                                            🗑️
                                        </button>
                                    </form>
                                </div>
                            </article>
                        @endforeach

                        <!-- Add Note Card -->
                        <article class="note-card-add" onclick="openNoteModal()">
                            <div class="add-icon">+</div>
                            <span>Buat Catatan</span>
                        </article>
                    </div>
                </section>
            </div>
        @else
            <div id="emptyState">
                <img src="https://cdn-icons-png.flaticon.com/512/748/748674.png" width="80" style="opacity:0.3; margin-bottom:20px;">
                <h3>Belum ada folder dipilih</h3>
                <p>Silakan pilih folder di sidebar atau buat folder baru.</p>
            </div>
        @endif
    </main>
  </div>

  <!-- MODAL CREATE/EDIT NOTE -->
  <div class="modal-backdrop" id="noteModalBackdrop">
    <div class="modal">
      <div class="modal-header">
        <span class="modal-title" id="noteModalTitle" style="font-weight:600">Catatan Baru</span>
        <button class="btn-text" onclick="closeNoteModal()">&times;</button>
      </div>
      <form id="noteForm" action="{{ route('notes.store') }}" method="POST">
        @csrf
        <input type="hidden" name="_method" id="noteFormMethod" value="POST">
        <div class="modal-body">
            <label>Judul</label>
            <input type="text" name="title" id="noteTitle" placeholder="Judul Catatan..." required autocomplete="off">

            <label>Isi Catatan</label>
            <textarea name="content" id="noteContent" placeholder="Tulis sesuatu..."></textarea>

            <label>Simpan di Folder</label>
            <select name="folder_id" id="noteFolder">
                @foreach($folders as $folder)
                    <option value="{{ $folder->id }}" {{ isset($activeFolder) && $activeFolder->id == $folder->id ? 'selected' : '' }}>
                        {{ $folder->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-text" onclick="closeNoteModal()">Batal</button>
            <button type="submit" class="btn btn-primary-solid">Simpan</button>
        </div>
      </form>
    </div>
  </div>

  <!-- MODAL CREATE FOLDER -->
  <div class="modal-backdrop" id="folderModalBackdrop">
    <div class="modal">
      <div class="modal-header">
        <span class="modal-title" style="font-weight:600">Folder Baru</span>
        <button class="btn-text" onclick="closeFolderModal()">&times;</button>
      </div>
      <form action="{{ route('folders.store') }}" method="POST">
        @csrf
        <div class="modal-body">
            <label>Nama Folder</label>
            <input type="text" name="name" placeholder="Contoh: Kuliah, Pribadi" required autocomplete="off">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-text" onclick="closeFolderModal()">Batal</button>
            <button type="submit" class="btn btn-primary-solid">Simpan</button>
        </div>
      </form>
    </div>
  </div>

  <!-- CONTEXT MENU -->
  <ul id="contextMenu" class="context-menu">
    <li onclick="renameFolder()">✏️ Ubah Nama</li>
    <li onclick="deleteFolder()" style="color:#ef4444">🗑️ Hapus Folder</li>
  </ul>

  <!-- MODAL RENAME FOLDER -->
  <div class="modal-backdrop" id="renameFolderModalBackdrop">
    <div class="modal">
      <div class="modal-header">
        <span class="modal-title" style="font-weight:600">Ubah Nama Folder</span>
        <button class="btn-text" onclick="closeRenameFolderModal()">&times;</button>
      </div>
      <form id="renameFolderForm" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-body">
            <label>Nama Baru</label>
            <input type="text" name="name" id="renameFolderName" required autocomplete="off">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-text" onclick="closeRenameFolderModal()">Batal</button>
            <button type="submit" class="btn btn-primary-solid">Simpan</button>
        </div>
      </form>
    </div>
  </div>

  <!-- HIDDEN DELETE FORM -->
  <form id="deleteFolderForm" method="POST" style="display:none">
    @csrf
    @method('DELETE')
  </form>

  <style>
    .context-menu {
        position: absolute;
        background: white;
        border: 1px solid #e5e7eb;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        padding: 6px;
        list-style: none;
        display: none;
        z-index: 50;
        min-width: 160px;
    }
    .context-menu li {
        padding: 8px 12px;
        font-size: 13px;
        color: #374151;
        cursor: pointer;
        border-radius: 6px;
        display: flex;
        gap: 8px;
    }
    .context-menu li:hover {
        background: #f3f4f6;
    }
  </style>

  <script>
    // Note Modal
    const noteModal = document.getElementById('noteModalBackdrop');
    const noteForm = document.getElementById('noteForm');
    const noteModalTitle = document.getElementById('noteModalTitle');
    const noteTitle = document.getElementById('noteTitle');
    const noteContent = document.getElementById('noteContent');
    const noteFolder = document.getElementById('noteFolder');
    const noteFormMethod = document.getElementById('noteFormMethod');

    function openNoteModal(note = null) { 
        @if($folders->count() == 0)
            alert("Buat folder terlebih dahulu!");
            openFolderModal();
            return;
        @endif

        if (note) {
            // EDIT MODE
            noteModalTitle.textContent = "Edit Catatan";
            noteForm.action = `/notes/${note.id}`;
            noteFormMethod.value = "PUT";
            noteTitle.value = note.title;
            noteContent.value = note.content;
            noteFolder.value = note.folder_id;
        } else {
            // CREATE MODE
            noteModalTitle.textContent = "Catatan Baru";
            noteForm.action = "{{ route('notes.store') }}";
            noteFormMethod.value = "POST";
            noteTitle.value = "";
            noteContent.value = "";
            noteFolder.value = "{{ isset($activeFolder) ? $activeFolder->id : ($folders->first()->id ?? '') }}";
        }

        noteModal.classList.add('show'); 
    }
    function closeNoteModal() { noteModal.classList.remove('show'); }

    // Folder Modal
    const folderModal = document.getElementById('folderModalBackdrop');
    function openFolderModal() { folderModal.classList.add('show'); }
    function closeFolderModal() { folderModal.classList.remove('show'); }

    // Rename Folder Modal
    const renameModal = document.getElementById('renameFolderModalBackdrop');
    const renameForm = document.getElementById('renameFolderForm');
    const renameInput = document.getElementById('renameFolderName');
    let contextMenuFolderId = null;
    let contextMenuFolderName = null;

    function closeRenameFolderModal() { renameModal.classList.remove('show'); }

    function renameFolder() {
        if (!contextMenuFolderId) return;
        renameModal.classList.add('show');
        renameForm.action = `/folders/${contextMenuFolderId}`;
        renameInput.value = contextMenuFolderName;
        hideContextMenu();
    }

    function deleteFolder() {
        if (!contextMenuFolderId) return;
        if (confirm(`Apakah Anda yakin ingin menghapus folder "${contextMenuFolderName}"? Semua catatan di dalamnya juga akan terhapus permanen.`)) {
            const form = document.getElementById('deleteFolderForm');
            form.action = `/folders/${contextMenuFolderId}`;
            form.submit();
        }
        hideContextMenu();
    }

    // Context Menu Logic
    const contextMenu = document.getElementById('contextMenu');
    
    // Hide menu on click elsewhere
    document.addEventListener('click', hideContextMenu);
    function hideContextMenu() { contextMenu.style.display = 'none'; }

    // Right Click handler attached to folder items via class 'folder-item-trigger'
    document.querySelectorAll('.folder-item-link').forEach(item => {
        item.addEventListener('contextmenu', function(e) {
            e.preventDefault();
            contextMenuFolderId = this.dataset.id;
            contextMenuFolderName = this.dataset.name;
            
            contextMenu.style.top = `${e.pageY}px`;
            contextMenu.style.left = `${e.pageX}px`;
            contextMenu.style.display = 'block';
        });
    });

    // Click outside to close modals
    window.onclick = function(event) {
        if (event.target == noteModal) closeNoteModal();
        if (event.target == folderModal) closeFolderModal();
        if (event.target == renameModal) closeRenameFolderModal();
    }
  </script>
</body>
</html>