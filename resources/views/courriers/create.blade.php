@extends('layouts.app') 
@section('content') 
<div 
class="min-h-screen bg-slate-50 px-4 py-10 transition-colors dark:bg-slate-950"
> 
<div 
class="mx-auto max-w-3xl"
> 
{{-- En-tête --}} 
<div 
class="mb-8"
> 
<a 
href="{{ url()->previous() }}" 
class="mb-5 inline-flex items-center gap-2 text-sm font-medium text-slate-600 hover:text-green-600 dark:text-slate-400 dark:hover:text-green-400" >
 ← Retour 
</a> 
<h1 
class="text-3xl font-bold text-slate-900 dark:text-white"
> 
Déposer un courrier 
</h1> 
<p class="mt-2 text-slate-600 dark:text-slate-400"
> 
Remplissez les informations ci-dessous pour transmettre votre courrier au secrétariat. 
</p> 
</div> 
{{-- Message de succès --}} 
@if(session('success')) 
<div 
class="mb-6 rounded-xl border border-green-200 bg-green-50 p-4 text-green-800 dark:border-green-900/50 dark:bg-green-950/40 dark:text-green-300"> 
<div class="flex gap-3"> <svg class="mt-0.5 h-5 w-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" > <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /> </svg> <p> {{ session('success') }} </p> </div> </div> @endif {{-- Erreur générale --}} @if($errors->has('courrier')) <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4 text-red-800 dark:border-red-900/50 dark:bg-red-950/40 dark:text-red-300"> {{ $errors->first('courrier') }} </div> @endif {{-- Formulaire --}} <form method="POST" action="{{ route('courriers.store') }}" enctype="multipart/form-data" class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm dark:border-slate-800 dark:bg-slate-900 sm:p-8" > @csrf {{-- Nom --}} <div class="mb-6"> <label for="nom" class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-200" > Nom du courrier </label> <input id="nom" name="nom" type="text" value="{{ old('nom') }}" required maxlength="255" placeholder="Exemple : Demande d'autorisation..." class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 outline-none transition focus:border-green-500 focus:ring-2 focus:ring-green-500/20 dark:border-slate-700 dark:bg-slate-950 dark:text-white" > @error('nom') <p class="mt-2 text-sm text-red-600 dark:text-red-400"> {{ $message }} </p> @enderror </div> {{-- Description --}} <div class="mb-6"> <label for="description" class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-200" > Description du courrier </label> <textarea id="description" name="description" rows="7" maxlength="10000" required placeholder="Décrivez brièvement le contenu ou l'objet de votre courrier..." class="w-full resize-y rounded-xl border border-slate-300 bg-white px-4 py-3 text-slate-900 outline-none transition focus:border-green-500 focus:ring-2 focus:ring-green-500/20 dark:border-slate-700 dark:bg-slate-950 dark:text-white" >{{ old('description') }}</textarea> @error('description') <p class="mt-2 text-sm text-red-600 dark:text-red-400"> {{ $message }} </p> @enderror </div> {{-- Fichiers --}} <div class="mb-8"> <label for="fichiers" class="mb-2 block text-sm font-semibold text-slate-700 dark:text-slate-200" > Pièces jointes </label> <input id="fichiers" name="fichiers[]" type="file" multiple accept=".pdf,.doc,.docx,.xls,.xlsx,.png,.jpg,.jpeg" class="block w-full cursor-pointer rounded-xl border border-slate-300 bg-white text-sm text-slate-700 file:mr-4 file:border-0 file:bg-green-600 file:px-4 file:py-3 file:font-medium file:text-white hover:file:bg-green-700 dark:border-slate-700 dark:bg-slate-950 dark:text-slate-300" > <p class="mt-2 text-xs text-slate-500 dark:text-slate-400"> Maximum 10 fichiers. Taille maximale : 10 Mo par fichier. Formats acceptés : PDF, Word, Excel, JPG et PNG. </p> @error('fichiers') <p class="mt-2 text-sm text-red-600 dark:text-red-400"> {{ $message }} </p> @enderror @error('fichiers.*') <p class="mt-2 text-sm text-red-600 dark:text-red-400"> {{ $message }} </p> @enderror </div> {{-- Information --}} <div class="mb-8 rounded-xl border border-green-200 bg-green-50 p-4 dark:border-green-900/50 dark:bg-green-950/30"> <div class="flex gap-3"> <svg class="mt-0.5 h-5 w-5 shrink-0 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" > <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 20a8 8 0 100-16 8 8 0 000 16z" /> </svg> <p class="text-sm text-green-800 dark:text-green-300"> Après validation, votre courrier sera transmis au secrétariat pour enregistrement. Le numéro officiel du courrier sera attribué par le secrétariat. </p> </div> </div> {{-- Boutons --}} <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end"> <a href="{{ url()->previous() }}" class="rounded-xl border border-slate-300 px-6 py-3 text-center text-sm font-semibold text-slate-700 transition hover:bg-slate-50 dark:border-slate-700 dark:text-slate-300 dark:hover:bg-slate-800" > Annuler </a> <button type="submit" class="rounded-xl bg-green-600 px-6 py-3 text-sm font-semibold text-white transition hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-slate-900" > Valider le dépôt </button> </div> </form> </div> </div> @endsection