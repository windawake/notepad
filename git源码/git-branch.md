获取当前分支

```c
char *refs_resolve_refdup(struct ref_store *refs,
			  const char *refname, int resolve_flags,
			  struct object_id *oid, int *flags)
{
	const char *result;

	result = refs_resolve_ref_unsafe(refs, refname, resolve_flags,
					 oid, flags);
	return xstrdup_or_null(result);
}
```
