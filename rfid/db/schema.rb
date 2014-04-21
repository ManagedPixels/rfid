# encoding: UTF-8
# This file is auto-generated from the current state of the database. Instead
# of editing this file, please use the migrations feature of Active Record to
# incrementally modify your database, and then regenerate this schema definition.
#
# Note that this schema.rb definition is the authoritative source for your
# database schema. If you need to create the application database on another
# system, you should be using db:schema:load, not running all the migrations
# from scratch. The latter is a flawed and unsustainable approach (the more migrations
# you'll amass, the slower it'll run and the greater likelihood for issues).
#
# It's strongly recommended that you check this file into your version control system.

ActiveRecord::Schema.define(version: 20140416205723) do

  create_table "attendances", force: true do |t|
    t.integer  "attendee_id"
    t.integer  "workshop_id"
    t.datetime "swipe_time"
    t.string   "status"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

  add_index "attendances", ["attendee_id"], name: "index_attendances_on_attendee_id", using: :btree
  add_index "attendances", ["workshop_id"], name: "index_attendances_on_workshop_id", using: :btree

  create_table "attendees", force: true do |t|
    t.string   "card_number"
    t.string   "first_name"
    t.string   "last_name"
    t.string   "middle_name"
    t.string   "title"
    t.integer  "org_id"
    t.string   "email"
    t.string   "card_type"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

  add_index "attendees", ["org_id"], name: "index_attendees_on_org_id", using: :btree

  create_table "messages", force: true do |t|
    t.integer  "attendee_id"
    t.text     "message"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

  add_index "messages", ["attendee_id"], name: "index_messages_on_attendee_id", using: :btree

  create_table "orgs", force: true do |t|
    t.string   "org_name"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

  create_table "surveys", force: true do |t|
    t.integer  "attendance_id"
    t.boolean  "complete"
    t.integer  "workshop_rating"
    t.integer  "speaker_rating"
    t.integer  "conference_rating"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

  add_index "surveys", ["attendance_id"], name: "index_surveys_on_attendance_id", using: :btree

  create_table "workshops", force: true do |t|
    t.string   "name"
    t.integer  "attendee_id"
    t.datetime "starts_at"
    t.datetime "ends_at"
    t.boolean  "rescheduled"
    t.string   "room_name"
    t.string   "building_name"
    t.datetime "created_at"
    t.datetime "updated_at"
  end

  add_index "workshops", ["attendee_id"], name: "index_workshops_on_attendee_id", using: :btree

end
