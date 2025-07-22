@csrf
<div class="mb-3">
  <label class="form-label">Nom</label>
  <input type="text" name="nom" class="form-control" value="{{ old('nom', $produit->nom ?? '') }}">
  @error('nom') <div class="text-danger">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
  <label class="form-label">Description</label>
  <textarea name="description" class="form-control">{{ old('description', $produit->description ?? '') }}</textarea>
  @error('description') <div class="text-danger">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
  <label class="form-label">Prix (€)</label>
  <input type="number" step="0.01" name="prix" class="form-control" value="{{ old('prix', $produit->prix ?? '') }}">
  @error('prix') <div class="text-danger">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
  <label class="form-label">Stock</label>
  <input type="number" name="stock" class="form-control" value="{{ old('stock', $produit->stock ?? '') }}">
  @error('stock') <div class="text-danger">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
  <label class="form-label">Catégorie</label>
  <select name="categorie" class="form-select">
    <option value="">-- Choisir une catégorie --</option>
    @foreach(['Boisson', 'Plat', 'Dessert'] as $cat)
      <option value="{{ $cat }}" {{ old('categorie', $produit->categorie ?? '') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
    @endforeach
  </select>
  @error('categorie') <div class="text-danger">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
  <label class="form-label">Image du produit</label>
  <input type="file" name="image" class="form-control">
  @if(!empty($produit->image))
    <img src="{{ asset($produit->image) }}" width="100" class="mt-2" alt="Image actuelle">
  @endif
  @error('image') <div class="text-danger">{{ $message }}</div> @enderror
</div>
