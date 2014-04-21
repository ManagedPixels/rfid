json.array!(@orgs) do |org|
  json.extract! org, :id, :org_name
  json.url org_url(org, format: :json)
end
